# PRD — KitaUndang (v1.0)
Di bawah KITAWEB • Mei 2026

## Daftar Isi
1. Ringkasan Produk
2. Tujuan & Sasaran
3. Target Pengguna
4. Alur Pengguna
5. Fitur Produk
6. Spesifikasi Teknis
7. Desain & UI/UX
8. Timeline MVP
9. Scope Ditunda (Out of MVP)
10. Risiko & Mitigasi

## 1. Ringkasan Produk
KitaUndang adalah platform SaaS undangan digital berbasis web yang memungkinkan individu membuat, mengelola, dan menyebarkan undangan digital secara mandiri dengan personalisasi nama penerima otomatis.

- Brand: KITAWEB
- Target pasar: Indonesia
- Tagline: “Mudahkan undang keluarga dan teman ke acaramu.”

## 2. Tujuan & Sasaran
**Primary goal:** Menyediakan platform pembuatan undangan digital yang mudah, cepat, dan profesional untuk individu di Indonesia.

**Business goal:** Monetisasi berbasis model *pay per invitation* (one-time payment per event) menggunakan Midtrans sebagai payment gateway.

**Success metrics (MVP):**
- Minimal 1 undangan aktif dipakai untuk acara sendiri (pilot).
- Waktu pembuatan undangan < 15 menit.
- Halaman undangan *load* < 3 detik di mobile.
- RSVP berfungsi penuh dan tersimpan di dashboard.

## 3. Target Pengguna
| Dimensi          | Detail                                             |
| ---------------- | -------------------------------------------------- |
| Segmen           | Individu (pengantin, keluarga penyelenggara acara) |
| Geografi         | Indonesia                                          |
| Literasi digital | Menengah (bisa isi form, pakai WhatsApp)           |
| Perangkat        | Mobile-first (Android/iOS)                         |
| Acara perdana    | Pernikahan (kategori lain menyusul)                |

**Persona utama**
- Rina (27), calon pengantin di Malang. Menginginkan undangan digital elegan, bisa dikirim via WhatsApp, dan tamu bisa RSVP langsung dari link tanpa perlu instal aplikasi.

## 4. Alur Pengguna
### 4.1 Alur pemilik undangan (creator)
Register/Login → Pilih Paket → Checkout (Midtrans) → Buat Undangan (form-based) → Pilih Template → Isi Data Acara → Import Daftar Tamu (CSV/Excel) → Preview Undangan → Publish → Kirim Link per Tamu (WA manual/broadcast) → Monitor Dashboard (RSVP, statistik, ucapan).

### 4.2 Alur penerima undangan (guest)
Terima link WhatsApp (berisi nama mereka) → Buka link di browser → Halaman undangan tampil dengan nama personal → Baca detail acara → RSVP (hadir/tidak hadir + jumlah tamu) → Tulis ucapan/doa → Lihat info rekening/amplop digital.

## 5. Fitur Produk
**Legenda prioritas:** 🔴 MVP • 🟡 V1.1 • 🔵 V2

### 5.1 Halaman Undangan (Guest View)
**Akses:** `kitaundang.id/u/{slug-undangan}?to=NamaTamu`

| Fitur                              | Deskripsi                                                     | Prioritas |
| ---------------------------------- | ------------------------------------------------------------- | --------- |
| Nama penerima otomatis             | Ambil dari query param `?to=` dan tampilkan di opening        | 🔴        |
| Opening / cover animasi            | Halaman pembuka dengan tombol “Buka Undangan”                 | 🔴        |
| Detail acara                       | Nama mempelai, tanggal, waktu, lokasi                         | 🔴        |
| Countdown timer                    | Hitung mundur ke hari H                                       | 🔴        |
| Google Maps embed                  | Peta lokasi venue + tombol buka di Maps                       | 🔴        |
| RSVP                               | Konfirmasi hadir/tidak + jumlah tamu                           | 🔴        |
| Ucapan & doa                       | Form kirim ucapan + tampilkan ucapan tamu lain                | 🔴        |
| Galeri foto                        | Grid foto (maks. 10–20 foto)                                  | 🔴        |
| Galeri video                       | Embed video prewedding (YouTube / upload)                     | 🟡        |
| Background musik                   | Autoplay musik + tombol mute/unmute                           | 🔴        |
| Amplop digital / transfer rekening | Tampilkan info rekening + tombol salin                        | 🔴        |
| Share ke WhatsApp & sosmed         | Tombol share native browser                                   | 🔴        |
| Bottom Navigation Bar              | Navigasi section (Beranda, Acara, RSVP, Galeri, Ucapan)        | 🔴        |
| Add to Google Calendar             | Tombol simpan acara ke kalender                               | 🟡        |
| QR Code per tamu                   | Identifikasi tamu saat check-in di venue                      | 🟡        |
| Custom pesan teks WA               | Teks undangan WA bisa dikustomisasi                           | 🔵        |

### 5.2 Dashboard (Creator View)
**Akses:** `kitaundang.id/dashboard` (mobile-first).

**Modul:**
- Beranda: ringkasan statistik (total undangan aktif, total tamu, total RSVP hadir, total ucapan).
- Manajemen undangan:
  - Buat undangan baru (wizard multi-step).
  - Edit undangan aktif.
  - Preview undangan.
  - Aktivasi/publish & status (draft/published/expired).
- Manajemen tamu:
  - CRUD daftar tamu.
  - Import CSV/Excel.
  - Generate link per tamu (dengan parameter `to` atau token).
- RSVP:
  - Rekap hadir/tidak hadir.
  - Ekspor data RSVP (CSV).
- Ucapan:
  - Moderasi ucapan (tampilkan/sembunyikan).
  - Ekspor ucapan (CSV).
- Pembayaran:
  - Status pembayaran per undangan.
  - Riwayat transaksi.
- Profil:
  - Data akun (nama, email, nomor WhatsApp).

### 5.3 Manajemen Tamu (Detail)
**Input minimal tamu (MVP):**
- Nama
- Nomor WhatsApp

**Opsional (pasca-MVP / kebutuhan tertentu):**
- Email

### 5.4 Sistem Pembayaran
- Model: *pay per invitation* (one-time per event).
- Payment gateway: Midtrans Snap (VA, QRIS, kartu kredit).
- Setelah pembayaran berhasil: slot undangan aktif otomatis.

**Rencana paket awal (estimasi):**
| Paket   | Harga (estimasi) | Fitur                                                        |
| ------- | ---------------- | ------------------------------------------------------------ |
| Basic   | Rp 99.000        | Template standard, tamu unlimited, aktif 6 bulan             |
| Premium | Rp 179.000       | Template premium, galeri video, broadcast WA, aktif 12 bulan |

## 6. Spesifikasi Teknis
### 6.1 Tech Stack
| Layer    | Teknologi                                                     |
| -------- | ------------------------------------------------------------- |
| Backend  | Laravel 11 (REST API)                                         |
| Frontend | Vue.js 3 + Inertia.js atau SPA terpisah                       |
| Database | MySQL 8                                                       |
| Storage  | Local VPS → upgrade S3-compatible (R2/MinIO) untuk media       |
| Hosting  | VPS (Coolify)                                                 |
| Payment  | Midtrans Snap                                                 |
| Maps     | Google Maps Embed API                                         |
| Auth     | Laravel Breeze / Sanctum                                      |

### 6.2 Struktur URL
| URL                                 | Keterangan               |
| ----------------------------------- | ------------------------ |
| `kitaundang.id/`                    | Landing page marketing   |
| `kitaundang.id/register`            | Registrasi               |
| `kitaundang.id/login`               | Login                    |
| `kitaundang.id/dashboard`           | Dashboard utama          |
| `kitaundang.id/dashboard/undangan`  | Kelola undangan          |
| `kitaundang.id/dashboard/tamu`      | Kelola tamu              |
| `kitaundang.id/u/{slug}`            | Halaman undangan (guest) |
| `kitaundang.id/u/{slug}?to=NamaTamu`| Undangan personal        |

### 6.3 Skema Database (Utama)
> Catatan: daftar kolom di bawah bersifat ringkas untuk memandu implementasi MVP.

- `users`: `id`, `name`, `email`, `password`, `phone`
- `invitations`: `id`, `user_id`, `slug`, `template_id`, `title`, `bride_name`, `groom_name`, `date`, `venue`, `maps_url`, `music_url`, `status`, `expired_at`
- `invitation_guests`: `id`, `invitation_id`, `name`, `phone`, `token`, `opened_at`, `rsvp_status`, `rsvp_count`
- `rsvp_responses`: `id`, `invitation_id`, `guest_id`, `status`, `guest_count`, `message`, `created_at`
- `wishes`: `id`, `invitation_id`, `guest_id`, `name`, `message`, `is_visible`, `created_at`
- `galleries`: `id`, `invitation_id`, `type` (photo/video), `path`, `order`
- `bank_accounts`: `id`, `invitation_id`, `bank_name`, `account_number`, `account_name`
- `templates`: `id`, `name`, `category`, `thumbnail`, `preview_url`, `tier` (basic/premium)
- `payments`: `id`, `user_id`, `invitation_id`, `midtrans_order_id`, `amount`, `status`

### 6.4 Non-Functional Requirements
- Mobile-first: semua halaman responsif, optimal di viewport 360–430px.
- Performa: halaman undangan LCP < 3 detik (lazy-load gambar, minify assets).
- SEO: landing page dioptimasi; halaman undangan boleh `noindex`.
- Security: CSRF protection, rate limiting RSVP & ucapan (anti-spam), validasi upload file.
- Uptime: target 99,5% (monitor via UptimeRobot).

## 7. Desain & UI/UX
### 7.1 Referensi Visual
- katsudoto.id — kualitas desain premium, animasi halus.
- sangmempelai.id — kelengkapan fitur, UX alur pemesanan.

### 7.2 Prinsip Desain
- Mobile-first untuk semua layar.
- Modern & colorful — palet warna hangat/elegan untuk tema pernikahan.
- Font: Plus Jakarta Sans (UI dashboard) + font dekoratif per template undangan.
- Animasi: subtle scroll-triggered animation pada halaman undangan.
- Bottom navigation bar: 5 ikon (Home, Acara, Galeri, RSVP, Ucapan).

### 7.3 Halaman yang Dibutuhkan
**Public**
- Landing page marketing (Hero, Fitur, Cara Kerja, Harga, CTA).
- Halaman undangan guest (`/u/{slug}`).

**Auth**
- Register, Login, Forgot Password.

**Dashboard**
- Beranda, Buat Undangan (wizard), Edit Undangan, Tamu, RSVP, Ucapan, Pembayaran, Profil.

## 8. Timeline MVP
| Minggu                  | Fokus                                                                                                          |
| ----------------------- | -------------------------------------------------------------------------------------------------------------- |
| Minggu 1 (14–18 Mei)    | Setup project Laravel + Vue, auth, database migration, template pertama (pernikahan), halaman undangan (guest) |
| Minggu 2 (19–25 Mei)    | Dashboard: manajemen tamu, import CSV, kirim manual WA, RSVP, ucapan                                           |
| Minggu 3 (26 Mei–1 Jun) | Integrasi Midtrans, landing page, testing end-to-end, bug fix, deploy VPS                                      |
| Buffer (2–7 Jun)        | UAT dengan undangan sendiri (pilot) + refinement                                                               |

## 9. Scope Ditunda (Out of MVP)
- Custom pesan teks WhatsApp.
- Broadcast via WA API (otomatis).
- Galeri video (upload native).
- QR Code check-in tamu.
- White-label / reseller.
- Kategori undangan selain pernikahan.
- Add to Google Calendar.
- Live streaming.

## 10. Risiko & Mitigasi
| Risiko                                     | Mitigasi                                                            |
| ------------------------------------------ | ------------------------------------------------------------------- |
| Timeline terlalu ketat (3 minggu solo dev) | Fokus MVP minimum: 1 template + fitur inti; polish post-launch      |
| Storage media foto membengkak di VPS       | Kompresi otomatis (TinyPNG API / Intervention Image)                |
| Spam RSVP & ucapan                         | Rate limiting per IP + honeypot field                               |
| Midtrans sandbox → production              | Test end-to-end di staging sebelum go-live                          |
| Link undangan bisa diakses tanpa token     | Tambahkan mode private (opsional) di V1.1                           |

