# KitaUndang

KitaUndang adalah platform SaaS undangan digital untuk pasar Indonesia, dengan MVP awal berfokus pada undangan pernikahan mobile-first, link personal per tamu, RSVP, ucapan, galeri, dan dashboard creator.

## Dokumen

- [PRD](PRD.md): kebutuhan produk dan spesifikasi awal.
- [Execution Plan](docs/EXECUTION_PLAN.md): scope MVP, sprint plan, data model, route map, backlog, dan checklist implementasi.

## Status Repo

Repo ini masih berada pada fase persiapan eksekusi. Scaffold aplikasi belum dibuat.

## Langkah Implementasi Pertama

1. Init Laravel 11 di root repo.
2. Pasang Laravel Breeze dengan Inertia Vue.
3. Setup database MySQL lokal.
4. Implement migration dan model utama sesuai `docs/EXECUTION_PLAN.md`.
5. Bangun flow pertama: auth, dashboard kosong, CRUD undangan, lalu guest view `/u/{slug}`.

## Target MVP

Flow pilot dianggap siap ketika creator bisa membuat undangan, mengimpor tamu, membagikan link personal, menerima RSVP/ucapan, dan melihat rekap di dashboard.
