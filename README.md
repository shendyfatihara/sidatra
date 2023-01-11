# 🏛️ SIDATRA — Sistem Informasi dan Administrasi Kependudukan Terpadu

<p align="center">
  <img src="assets/img/kabupaten-cirebon.png" alt="Logo Kabupaten Cirebon" width="110">
</p>

<p align="center">
  <strong>Aplikasi Pengelolaan Data Kependudukan & Pelayanan Surat Administrasi Desa Berbasis Web</strong>
  <br>
  <em>Studi Kasus: Kantor Kuwu Desa Putat, Kecamatan Sedong, Kabupaten Cirebon</em>
</p>

<p align="center">
  <img src="https://img.shields.io/badge/PHP-Native-777bb4?style=for-the-badge&logo=php&logoColor=white" alt="PHP">
  <img src="https://img.shields.io/badge/MySQL-MariaDB-4479A1?style=for-the-badge&logo=mysql&logoColor=white" alt="MySQL">
  <img src="https://img.shields.io/badge/AdminLTE-3.0-3c8dbc?style=for-the-badge" alt="AdminLTE">
  <img src="https://img.shields.io/badge/Bootstrap-4.6-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white" alt="Bootstrap">
  <img src="https://img.shields.io/badge/Chart.js-Visualisasi-FF6384?style=for-the-badge&logo=chartdotjs&logoColor=white" alt="Chart.js">
  <img src="https://img.shields.io/badge/License-MIT-green?style=for-the-badge" alt="License">
</p>

---

## 📌 Tentang Proyek

**SIDATRA (Sistem Informasi dan Administrasi Kependudukan Terpadu)** adalah aplikasi berbasis web yang dirancang untuk mengelola data administrasi kependudukan dan memfasilitasi pelayanan pencetakan surat keterangan resmi di tingkat desa (studi kasus: Desa Putat, Kec. Sedong, Kab. Cirebon).

---

## ✨ Fitur Utama

### 📊 Dashboard Statistik
- Ringkasan jumlah warga aktif, Kartu Keluarga, klasifikasi gender, serta data mutasi penduduk
- Grafik donat **komposisi jenis kelamin** (Laki-laki vs Perempuan) menggunakan Chart.js
- Grafik batang **sirkulasi kependudukan**: kelahiran, kematian, pendatang, dan kepindahan

### 👥 Manajemen Data Induk Kependudukan
- **Data Penduduk** — pencatatan NIK, nama, tempat/tanggal lahir, jenis kelamin, alamat (RT/RW), agama, status perkawinan, pekerjaan, dan status kependudukan
- **Kartu Keluarga (KK)** — pengelolaan nomor KK, kepala keluarga, dan relasi anggota keluarga (Kepala Keluarga, Istri, Anak, dsb.)
- **Penyaringan** berdasarkan jenis kelamin (tampilan khusus Laki-laki / Perempuan)

### 🔄 Pencatatan Sirkulasi & Mutasi Penduduk
- **Kelahiran** — data bayi baru lahir yang terhubung dengan Kartu Keluarga
- **Kematian** — pencatatan warga meninggal beserta tanggal dan penyebab, otomatis mengubah status warga
- **Pendatang** — data warga baru yang datang ke desa
- **Pindah** — data warga yang pindah domisili beserta alasan kepindahan

### 🖨️ Cetak Surat Keterangan (Format Resmi A4)
Mendukung cetak langsung (*print-ready*) dengan **kop surat resmi** Pemerintah Kabupaten Cirebon / Kantor Kuwu Desa Putat, penomoran surat otomatis, dan format tanggal Bahasa Indonesia:
- 📄 Surat Keterangan Domisili
- 📄 Surat Keterangan Kelahiran
- 📄 Surat Keterangan Kematian
- 📄 Surat Keterangan Pendatang
- 📄 Surat Keterangan Pindah

Setiap halaman cetak dilengkapi toolbar **Cetak Dokumen** dan **Tutup Halaman**, serta CSS `@media print` yang otomatis menyembunyikan elemen navigasi saat dicetak.

### 🔐 Autentikasi & Hak Akses (2 Level)
| Peran | Hak Akses |
|---|---|
| **Administrator** | Akses penuh: seluruh data, surat, dan manajemen pengguna sistem |
| **Kaur Pemerintah** | Akses operasional: input data kependudukan dan pencetakan surat |

---

## 🛠️ Teknologi yang Digunakan

| Kategori | Teknologi |
|---|---|
| **Bahasa Pemrograman** | PHP (Native / Prosedural) |
| **Basis Data** | MySQL / MariaDB |
| **Template Admin** | AdminLTE 3 |
| **Frontend** | Bootstrap 4.6, jQuery |
| **Visualisasi** | Chart.js |
| **Komponen UI** | DataTables, Select2, SweetAlert2, Font Awesome 5 |
| **Server Lokal** | XAMPP / Apache |

---

## 📦 Apa Saja yang Tersedia?

- ✅ Source code lengkap aplikasi
- ✅ File database SQL (`data_penduduk.sql`) siap import
- ✅ Panduan instalasi di bawah
- ✅ Akun demo untuk pengujian

---

## 🚀 Panduan Instalasi

### 1. Prasyarat
- **[XAMPP](https://www.apachefriends.org/)** sudah terpasang (PHP 7.4+ dan MySQL/MariaDB)
- **[Git](https://git-scm.com/)** sudah terpasang di komputer

### 2. Clone Repositori
Clone ke folder `htdocs` XAMPP:
```bash
cd C:/xampp/htdocs
git clone https://github.com/shendyfatihara/sidatra.git
```
> Sesuaikan path jika XAMPP Anda ada di drive lain (misalnya `D:/xampp/htdocs`).

### 3. Import Database
1. Buka **[http://localhost/phpmyadmin](http://localhost/phpmyadmin)** di browser
2. Buat database baru dengan nama **`data_penduduk`**
3. Klik tab **Import** → pilih file `data_penduduk.sql` dari folder proyek → klik **Go**

### 4. Konfigurasi Koneksi (Jika Diperlukan)
File koneksi database ada di `inc/koneksi.php`:
```php
<?php
$koneksi = new mysqli("localhost", "root", "", "data_penduduk");
```
Sesuaikan `username` atau `password` jika konfigurasi MySQL lokal Anda berbeda.

### 5. Jalankan Aplikasi
Buka browser dan akses:
```
http://localhost/sidatra/
```

---

## 🔑 Akun Demo

| Peran | Username | Password |
|---|---|---|
| **Administrator** | `admin` | `admin1` |
| **Kaur Pemerintah** | `kaur` | `kaur1` |

---

## 📂 Struktur Direktori

```
sidatra/
├── admin/                  # Modul CRUD pengelolaan data
│   ├── datang/             #   └─ Data pendatang
│   ├── kartu/              #   └─ Kartu Keluarga & anggota
│   ├── lahir/              #   └─ Data kelahiran
│   ├── mendu/              #   └─ Data kematian
│   ├── pend/               #   └─ Data induk penduduk
│   ├── pengguna/           #   └─ Pengguna sistem
│   └── pindah/             #   └─ Data pindah
├── assets/                 # Gambar (logo, ikon)
├── dist/                   # Asset AdminLTE (CSS, JS)
├── home/                   # Halaman dashboard (admin & kaur)
├── inc/                    # Konfigurasi koneksi database
├── plugins/                # Library pihak ketiga (DataTables, Chart.js, Select2, dll.)
├── report/                 # Template cetak surat (format A4)
├── surat/                  # Form pemilihan data untuk cetak surat
├── data_penduduk.sql       # Skema & data sampel database
├── index.php               # Halaman utama (router)
├── login.php               # Halaman login
├── logout.php              # Proses logout & hapus session
└── README.md               # Dokumentasi proyek ini
```

---

## 🗄️ Skema Database

Aplikasi menggunakan **8 tabel** utama dalam database MySQL:

| Tabel | Keterangan |
|---|---|
| `tb_pdd` | Data induk penduduk (NIK, nama, alamat, status, dsb.) |
| `tb_kk` | Data Kartu Keluarga |
| `tb_anggota` | Relasi anggota KK ↔ penduduk (tabel penghubung) |
| `tb_lahir` | Pencatatan kelahiran |
| `tb_mendu` | Pencatatan kematian |
| `tb_datang` | Pencatatan pendatang |
| `tb_pindah` | Pencatatan pindah domisili |
| `tb_pengguna` | Data pengguna sistem (login) |

Seluruh relasi antar-tabel menggunakan *foreign key* dengan `ON DELETE CASCADE` dan `ON UPDATE CASCADE`.

---

## 👤 Pengembang

- **Pengembang**: Shendy Fatihara ([@shendyfatihara](https://github.com/shendyfatihara))
- **Periode Pembuatan**: 08/10/2022 – 11/01/2023

---

## 📄 Lisensi

Proyek ini menggunakan lisensi [MIT](LICENSE).

---

<p align="center">
  Dibuat untuk membantu tata kelola administrasi kependudukan desa.
</p>

