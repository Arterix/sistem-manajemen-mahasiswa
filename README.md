# Sistem Manajemen Mahasiswa

Aplikasi web sederhana untuk mengelola data mahasiswa, dibangun dengan Laravel dan Bootstrap 5.

## Fitur

- **Dashboard** — ringkasan statistik total mahasiswa, jumlah jurusan, dan data terbaru
- **CRUD Mahasiswa** — tambah, lihat detail, edit, dan hapus data mahasiswa
- **Sorting tabel** — urutkan data berdasarkan Nama, NIM, atau Jurusan (asc/desc)

## Teknologi

- PHP / Laravel
- SQLite (database lokal, tidak perlu konfigurasi server)
- Bootstrap 5
- Vite

## Instalasi

**1. Clone / ekstrak project**
```bash
cd C:\laragon\www\sistem-manajemen-mahasiswa-bening
```

**2. Install dependencies PHP** (jika folder `vendor` belum ada)
```bash
composer install
```

**3. Salin file environment**
```bash
cp .env.example .env
php artisan key:generate
```
> Jika `.env` sudah ada, lewati langkah ini.

**4. Jalankan migrasi database**
```bash
php artisan migrate
```

**5. Install dependencies Node**
```bash
npm install
```

**6. Jalankan aplikasi**

Buka dua terminal:
```bash
# Terminal 1
php artisan serve

# Terminal 2
npm run dev
```

Akses di browser: `http://localhost:8000`

## Struktur Data Mahasiswa

| Field     | Tipe    | Keterangan              |
|-----------|---------|-------------------------|
| `id`      | integer | Primary key, auto       |
| `nama`    | string  | Nama lengkap mahasiswa  |
| `nim`     | string  | Nomor Induk Mahasiswa (unik) |
| `jurusan` | string  | Program studi           |

## Catatan

- Database menggunakan SQLite — file tersimpan di `database/database.sqlite`
- Tidak memerlukan MySQL atau konfigurasi server database tambahan
