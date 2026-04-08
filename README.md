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

```bash
# Terminal 1
php artisan serve
```

Akses di browser: `http://localhost:8000`

## Struktur Data Mahasiswa

| Field     | Tipe    | Keterangan              |
|-----------|---------|-------------------------|
| `id`      | integer | Primary key, auto       |
| `nama`    | string  | Nama lengkap mahasiswa  |
| `nim`     | string  | Nomor Induk Mahasiswa (unik) |
| `jurusan` | string  | Program studi           |

## Dokumentasi API

Base URL: `http://localhost:8000/api`

Semua request harus menyertakan header berikut:

| Header | Value |
|--------|-------|
| `Accept` | `application/json` |
| `Content-Type` | `application/json` |

---

### GET /mahasiswa
Mengambil seluruh data mahasiswa.

- **Method:** `GET`
- **URL:** `/api/mahasiswa`
- **Body:** tidak diperlukan

**Response sukses (200):**
```json
[
  {
    "id": 1,
    "nama": "Budi Santoso",
    "nim": "12345678",
    "jurusan": "Informatika"
  }
]
```

---

### POST /mahasiswa
Menambahkan data mahasiswa baru.

- **Method:** `POST`
- **URL:** `/api/mahasiswa`

**Request body:**
```json
{
  "nama": "Budi Santoso",
  "nim": "12345678",
  "jurusan": "Informatika"
}
```

| Field | Tipe | Validasi |
|-------|------|----------|
| `nama` | string | required, max 255 |
| `nim` | string | required, max 20, unik |
| `jurusan` | string | required, max 100 |

**Response sukses (201):**
```json
{
  "id": 1,
  "nama": "Budi Santoso",
  "nim": "12345678",
  "jurusan": "Informatika"
}
```

---

### GET /mahasiswa/{id}
Mengambil detail satu mahasiswa berdasarkan ID.

- **Method:** `GET`
- **URL:** `/api/mahasiswa/{id}`
- **Body:** tidak diperlukan

**Response sukses (200):**
```json
{
  "id": 1,
  "nama": "Budi Santoso",
  "nim": "12345678",
  "jurusan": "Informatika"
}
```

**Response gagal (404):**
```json
{
  "message": "Data tidak ditemukan."
}
```

---

### PUT /mahasiswa/{id}
Memperbarui data mahasiswa berdasarkan ID.

- **Method:** `PUT`
- **URL:** `/api/mahasiswa/{id}`

**Request body:**
```json
{
  "nama": "Budi Santoso",
  "nim": "12345678",
  "jurusan": "Sistem Informasi"
}
```

| Field | Tipe | Validasi |
|-------|------|----------|
| `nama` | string | required, max 255 |
| `nim` | string | required, max 20, unik (kecuali milik sendiri) |
| `jurusan` | string | required, max 100 |

**Response sukses (200):**
```json
{
  "id": 1,
  "nama": "Budi Santoso",
  "nim": "12345678",
  "jurusan": "Sistem Informasi"
}
```

**Response gagal (404):**
```json
{
  "message": "Data tidak ditemukan."
}
```

---

### DELETE /mahasiswa/{id}
Menghapus data mahasiswa berdasarkan ID.

- **Method:** `DELETE`
- **URL:** `/api/mahasiswa/{id}`
- **Body:** tidak diperlukan

**Response sukses (200):**
```json
{
  "message": "Data mahasiswa berhasil dihapus."
}
```

**Response gagal (404):**
```json
{
  "message": "Data tidak ditemukan."
}
```

---
## Catatan

- Database menggunakan SQLite — file tersimpan di `database/database.sqlite`
- Tidak memerlukan MySQL atau konfigurasi server database tambahan
