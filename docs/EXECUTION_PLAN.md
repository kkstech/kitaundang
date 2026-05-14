# KitaUndang MVP Execution Plan

Dokumen ini menerjemahkan `PRD.md` menjadi pegangan eksekusi untuk MVP KitaUndang. Targetnya adalah menghasilkan platform undangan digital pernikahan yang bisa dipakai untuk pilot acara sendiri sebelum polish dan perluasan fitur.

## 1. Keputusan Eksekusi

### Scope MVP yang Dikerjakan

MVP fokus pada satu alur lengkap:

Creator daftar/login, membuat satu undangan pernikahan, mengelola daftar tamu, membagikan link personal, menerima RSVP dan ucapan, lalu melihat rekapnya di dashboard.

Fitur MVP:

- Auth creator: register, login, logout, forgot password dasar.
- Dashboard ringkas: statistik undangan, tamu, RSVP, dan ucapan.
- CRUD undangan pernikahan dengan status `draft`, `published`, `expired`.
- Satu template undangan pernikahan mobile-first.
- Guest view `/u/{slug}?to=NamaTamu`.
- Opening cover dengan tombol buka undangan.
- Detail acara, countdown, lokasi, Google Maps link/embed.
- RSVP hadir/tidak hadir, jumlah tamu, dan ucapan.
- Daftar ucapan visible.
- Galeri foto.
- Musik background dengan kontrol mute/unmute.
- Amplop digital dengan tombol salin rekening.
- Manajemen tamu CRUD, import CSV, generate link WA manual.
- Export CSV untuk RSVP dan ucapan.
- Payment placeholder internal pada Sprint 1-2, Midtrans masuk Sprint 3.

### Scope yang Ditunda

- Broadcast WhatsApp otomatis.
- QR check-in.
- Galeri video upload native.
- Add to Google Calendar.
- Private invitation token wajib.
- Multi kategori acara.
- Multi template premium.
- White-label/reseller.

## 2. Arsitektur Produk

### Stack

- Backend: Laravel 11.
- Frontend: Vue 3 + Inertia.js.
- Database: MySQL 8.
- Auth: Laravel Breeze Inertia.
- CSS: Tailwind CSS.
- Payment: Midtrans Snap.
- Storage awal: local filesystem.
- Deploy: VPS via Coolify.

### Struktur Domain

- `Invitation`: data utama undangan dan status publish.
- `InvitationGuest`: daftar tamu dan link personal.
- `RsvpResponse`: konfirmasi kehadiran.
- `Wish`: ucapan/doa.
- `Gallery`: media foto.
- `BankAccount`: amplop digital.
- `Template`: metadata template.
- `Payment`: transaksi Midtrans.

## 3. Route Map

### Public

| Route | Tujuan |
| --- | --- |
| `GET /` | Landing page marketing |
| `GET /u/{slug}` | Guest invitation view |
| `POST /u/{slug}/rsvp` | Submit RSVP |
| `POST /u/{slug}/wishes` | Submit ucapan |

### Auth

| Route | Tujuan |
| --- | --- |
| `GET /register` | Register |
| `GET /login` | Login |
| `GET /forgot-password` | Reset password |

### Dashboard

| Route | Tujuan |
| --- | --- |
| `GET /dashboard` | Statistik creator |
| `GET /dashboard/invitations` | List undangan |
| `GET /dashboard/invitations/create` | Wizard buat undangan |
| `GET /dashboard/invitations/{invitation}/edit` | Edit undangan |
| `GET /dashboard/invitations/{invitation}/preview` | Preview |
| `PATCH /dashboard/invitations/{invitation}/publish` | Publish |
| `GET /dashboard/invitations/{invitation}/guests` | Kelola tamu |
| `POST /dashboard/invitations/{invitation}/guests/import` | Import CSV |
| `GET /dashboard/invitations/{invitation}/rsvp/export` | Export RSVP |
| `GET /dashboard/invitations/{invitation}/wishes/export` | Export ucapan |
| `GET /dashboard/payments` | Riwayat pembayaran |
| `GET /dashboard/profile` | Profil akun |

## 4. Data Model MVP

### `users`

- `id`
- `name`
- `email`
- `password`
- `phone`
- timestamps

### `invitations`

- `id`
- `user_id`
- `template_id`
- `slug`
- `title`
- `bride_name`
- `groom_name`
- `date`
- `start_time`
- `end_time`
- `venue`
- `address`
- `maps_url`
- `music_url`
- `status`: `draft`, `published`, `expired`
- `published_at`
- `expired_at`
- timestamps

### `invitation_guests`

- `id`
- `invitation_id`
- `name`
- `phone`
- `token`
- `opened_at`
- `rsvp_status`: nullable `attending`, `not_attending`
- `rsvp_count`
- timestamps

### `rsvp_responses`

- `id`
- `invitation_id`
- `guest_id`
- `status`: `attending`, `not_attending`
- `guest_count`
- `message`
- timestamps

### `wishes`

- `id`
- `invitation_id`
- `guest_id`
- `name`
- `message`
- `is_visible`
- timestamps

### `galleries`

- `id`
- `invitation_id`
- `type`: `photo`, `video`
- `path`
- `sort_order`
- timestamps

### `bank_accounts`

- `id`
- `invitation_id`
- `bank_name`
- `account_number`
- `account_name`
- timestamps

### `templates`

- `id`
- `name`
- `category`
- `thumbnail`
- `preview_url`
- `tier`: `basic`, `premium`
- timestamps

### `payments`

- `id`
- `user_id`
- `invitation_id`
- `midtrans_order_id`
- `amount`
- `status`: `pending`, `paid`, `failed`, `expired`
- `paid_at`
- timestamps

## 5. Sprint Plan

### Sprint 0: Project Bootstrap

Tujuan: repo siap dikembangkan lokal.

- Init Laravel 11.
- Pasang Breeze Inertia Vue.
- Setup Tailwind, lint/format dasar.
- Konfigurasi `.env.example`.
- Setup MySQL lokal.
- Buat struktur model, migration, factory, seeder awal.
- Tambahkan template seed `Classic Wedding`.
- Tambahkan README setup lokal.

Acceptance:

- `php artisan test` berjalan.
- Register/login berfungsi.
- Dashboard kosong bisa diakses setelah login.

### Sprint 1: Guest Invitation Core

Tujuan: satu undangan published bisa dibuka tamu dan menerima RSVP.

- Implement model relasi utama.
- CRUD minimal invitation dari dashboard.
- Publish invitation.
- Guest route `/u/{slug}`.
- Ambil nama penerima dari `?to=`.
- Opening cover dan halaman undangan mobile-first.
- Countdown ke tanggal acara.
- RSVP form dengan rate limiting dan validasi.
- Wish form dengan honeypot dan moderasi visible default.
- Bank account section dengan copy button.
- Gallery photo grid.
- Music control.

Acceptance:

- Creator bisa membuat dan publish undangan.
- Tamu bisa membuka link personal.
- RSVP tersimpan dan muncul di dashboard.
- Ucapan tersimpan dan muncul di guest view.

### Sprint 2: Dashboard Operations

Tujuan: creator bisa mengelola tamu dan memantau data.

- Dashboard statistik.
- CRUD tamu.
- Import CSV tamu.
- Generate link personal dan link WhatsApp.
- List RSVP dan filter status.
- Export RSVP CSV.
- List ucapan dan toggle visible/hidden.
- Export ucapan CSV.
- Edit profil creator.
- Landing page sederhana.

Acceptance:

- Creator bisa import CSV berisi nama dan nomor WhatsApp.
- Link WhatsApp per tamu berisi URL personal.
- Export CSV bisa dibuka di spreadsheet.
- Ucapan bisa disembunyikan dari guest view.

### Sprint 3: Payment, Hardening, Deploy

Tujuan: alur pembayaran dan deployment siap pilot.

- Integrasi Midtrans Snap sandbox.
- Buat paket Basic dan Premium sebagai config/seed.
- Checkout sebelum membuat/publish undangan berbayar.
- Webhook Midtrans untuk update `payments.status`.
- Aktivasi slot undangan setelah pembayaran sukses.
- Validasi upload foto.
- Kompresi gambar awal bila memungkinkan.
- SEO landing page.
- `noindex` untuk halaman undangan.
- Rate limiting RSVP dan wish.
- Deploy staging di Coolify.
- UAT pilot.

Acceptance:

- Pembayaran sandbox mengubah status payment ke `paid`.
- Invitation hanya bisa publish setelah pembayaran valid.
- Halaman guest mobile load cepat dengan lazy image.
- Smoke test produksi/staging lolos.

## 6. Backlog Prioritas

### P0: Harus Ada untuk Pilot

- Auth creator.
- Database model dan migration utama.
- CRUD invitation.
- Publish invitation.
- Guest view mobile.
- RSVP.
- Wish.
- Dashboard statistik.
- CRUD/import tamu.
- Link personal per tamu.
- Export RSVP dan ucapan.
- Amplop digital.
- Galeri foto.
- Deploy staging.

### P1: Penting Setelah Flow Utama Stabil

- Midtrans Snap.
- Landing page.
- Moderasi ucapan.
- Image optimization.
- Better empty states.
- Activity/opened tracking.
- Expired invitation handling.

### P2: Polish dan V1.1

- QR guest check-in.
- Add to Google Calendar.
- Template kedua.
- Tokenized private links.
- Custom WA message.
- Video embed.

## 7. Acceptance Checklist MVP

- Creator bisa register/login/logout.
- Creator bisa membuat undangan dalam kurang dari 15 menit.
- Creator bisa publish undangan.
- Creator bisa mengimpor daftar tamu CSV.
- Creator bisa menyalin/membuka link WhatsApp per tamu.
- Guest melihat nama personal dari query `to`.
- Guest bisa membuka undangan dari mobile.
- Guest bisa RSVP hadir/tidak hadir.
- Guest bisa mengisi jumlah tamu.
- Guest bisa mengirim ucapan.
- Guest bisa melihat detail acara, maps, galeri, amplop digital.
- Dashboard menampilkan total tamu, RSVP hadir/tidak hadir, dan ucapan.
- Creator bisa export RSVP dan ucapan.
- Halaman guest tidak terindeks mesin pencari.
- Form RSVP dan ucapan memiliki validasi, CSRF, rate limit, dan honeypot.
- Deployment staging bisa diakses publik.

## 8. Risiko Teknis dan Mitigasi

| Risiko | Mitigasi Eksekusi |
| --- | --- |
| Scope terlalu besar untuk 3 minggu | Kunci satu template, satu kategori, satu flow pilot |
| UI undangan butuh polish tinggi | Mulai dari template mobile tunggal dan iterasi visual setelah flow data beres |
| Import CSV variasi format | MVP menerima header baku: `name`, `phone` |
| Spam RSVP/ucapan | Rate limit per IP, honeypot, validasi panjang pesan |
| Midtrans butuh waktu sandbox-production | Integrasi di Sprint 3, payment placeholder dipakai saat Sprint 1-2 |
| Media membuat load lambat | Lazy-load, batas jumlah foto, validasi ukuran upload |

## 9. Setup Checklist Implementasi Berikutnya

Langkah teknis pertama saat mulai coding:

1. Init Laravel 11 di repo ini.
2. Install Breeze Inertia Vue.
3. Buat migration/model sesuai data model MVP.
4. Seed template awal.
5. Implement route dashboard kosong.
6. Implement CRUD invitation.
7. Implement guest view statis dari data seed.
8. Sambungkan RSVP dan wish.

## 10. Catatan Produk

Untuk pilot, jangan mulai dari payment atau landing page. Nilai utama MVP adalah undangan yang benar-benar bisa dipakai dan data tamu/RSVP yang tersimpan rapi. Payment dan marketing page menjadi penting setelah alur undangan terbukti end-to-end.
