# KitaUndang

KitaUndang adalah platform SaaS undangan digital untuk pasar Indonesia, dengan MVP awal berfokus pada undangan pernikahan mobile-first, link personal per tamu, RSVP, ucapan, galeri, dan dashboard creator.

## Dokumen

- [PRD](PRD.md): kebutuhan produk dan spesifikasi awal.
- [Execution Plan](docs/EXECUTION_PLAN.md): scope MVP, sprint plan, data model, route map, backlog, dan checklist implementasi.

## Status Repo

Repo ini sudah memiliki scaffold Laravel 11, Breeze Inertia Vue, auth bawaan, migration/model domain MVP, dan seed template awal sebagai dasar Sprint 0.

## Langkah Implementasi Pertama

1. Setup database MySQL lokal sesuai `.env.example`.
2. Jalankan migration dan seeder.
3. Bangun flow Sprint 1: CRUD undangan, publish, lalu guest view `/u/{slug}`.
4. Sambungkan RSVP dan ucapan ke dashboard.

## Setup Lokal

```bash
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate
npm run dev
```

Untuk verifikasi:

```bash
php artisan test
npm run build
```

## Target MVP

Flow pilot dianggap siap ketika creator bisa membuat undangan, mengimpor tamu, membagikan link personal, menerima RSVP/ucapan, dan melihat rekap di dashboard.
