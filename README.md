# CareerBridge

![CareerBridge Logo](https://github.com/user-attachments/assets/7e0c7f03-1b58-4221-9517-25851fbb0f62)

## Tentang CareerBridge

**CareerBridge** adalah platform berbasis web yang dirancang untuk memudahkan pencari kerja menemukan lowongan yang sesuai dengan keterampilan mereka dan mempermudah perusahaan dalam memasang lowongan serta merekrut karyawan. Dengan antarmuka yang intuitif, fitur pencarian lowongan, bookmark lowongan, serta dashboard pengguna, CareerBridge bertujuan untuk menjembatani kebutuhan antara pencari kerja dan perusahaan dengan cara yang efisien. Platform ini juga menyediakan informasi terkini tentang lowongan pekerjaan, tips pembuatan CV, serta panduan wawancara untuk memberikan pengalaman yang komprehensif bagi para pencari kerja.

### Fitur Utama:
1. **Pencari Kerja**: Cari lowongan, simpan lowongan favorit, dan lamar pekerjaan langsung melalui platform.
2. **Perusahaan**: Pasang lowongan, kelola lowongan, dan lihat pelamar.
3. **Dashboard**: Dashboard khusus untuk pelamar dan perusahaan untuk mengelola aktivitas mereka.
4. **Tips Loker**: Artikel dan tips untuk membantu pencari kerja dalam proses rekrutmen.

Proyek ini dibangun menggunakan **PHP**, **MySQL**, **Bootstrap 5**, dan dijalankan pada server lokal seperti **XAMPP**.

---

## Tata Cara Instalasi

Berikut adalah langkah-langkah untuk menginstal dan menjalankan CareerBridge di localhost Anda:

### Prasyarat
- **XAMPP** (atau server lokal lain yang Anda miliki seperti WAMP/LAMP) dengan PHP versi 7.4 atau lebih tinggi.
- **MySQL** untuk database atau bisa juga menggunakan **phpMyAdmin**.
- Koneksi internet untuk mengunduh dependensi Bootstrap via CDN (opsional jika Anda menggunakan file lokal).

### Langkah Instalasi:
1. **Clone Repository**  
   Clone repository ini ke direktori lokal Anda menggunakan perintah berikut:
   ```bash
   git clone https://github.com/dheaintan/careerbridge.git

2. **Pindahkan ke Direktori XAMPP** - Pindahkan folder *CareerBridge* ke direktori *htdocs* di XAMPP. Contoh lokasi:
   C:\xampp\htdocs\careerbridge

3. **Buat Databae**
   - Buka phpMyAdmin di browser: http://localhost/phpmyadmin
   - Buat database baru bernama *careerbridge*
   - Impor file SQL careerbridge.sql ke database tersebut untuk membuat tabel-tabel yang diperlukan.

4. **Konfigurasi Koneksi Database**
   - Buka file koneksi.php di careerbridge/koneksi.php

5. **Siapkan File Statis**
   - Pastikan folder *uploads/logo* ada di *careerbridge/uploads/logos/* untuk menyimpan logo perusahaan.
   - Pastikan file *logo careerbridge.png* ada di *careerbridge/logo cereerbridge.png sebagai logo default.
   - Berikan izin tulis pada folder *uploads/logo*:
     Klik kanan folder → Properties → Security → Berikan izin "Full Control" untuk "Everyone" (khusus Windows).

6. **Jalankan Server**
   - Start Apache dan MySQL di XAMPP Control Panel.
   - Buka browser dan akses: http://localhost/careerbridge

7. **Login atau Daftar**
   - Daftar sebagai Pencari Kerja : http://localhost/careerbridge/pelamar/daftarpekerja.php
   - Daftar sebagai Perusahaan : http://localhost/careerbridge/perusahaan/daftarperusahaan.php


## Struktur Direktori

Berikut adalah struktur direktori dari proyek CareerBridge:

- **careerbridge/**
  - **assets/**                    # File CSS, JS, dan aset lainnya
    - bootstrap.min.css
  - **pelamar/**                   # Halaman untuk pencari kerja
    - cari-loker.php
    - daftarpekerja.php
    - dashboard-pelamar.php
    - editprofil-pelamar.php
    - hapus_bookmark.php
    - landingpage-pelamar.php
    - logout-pelamar.php
    - lowongandisimpan-pelamar.php
    - masukpekerja.php
    - simpan_bookmark.php
    - simpan_lamaran.php
  - **perusahaan/**                # Halaman untuk perusahaan
    - daftarlowongan.php
    - daftarperusahaan.php
    - dashboard-perusahaan.php
    - detail-pekerjaan.php
    - detail-pelamar.php
    - edit-lowongan.php
    - editprofil-perusahaan.php
    - landingpage-perusahaan.phhp
    - lihat-pelamar.php
    - logout-perusahaan.php
    - masukperusahaan.php
    - pasang-loker.php
    - tambah-lowongan.php
    - **picture/**                # Halaman untuk foto statis di halaman artikel
  - **uploads/**                   # Folder untuk menyimpan file upload
    - **cv/**                      # Folder untuk menyimpan CV pelamar
    - **logos/**                   # Folder untuk menyimpan logo perusahaan
  - logo careerbridge.png          # Logo default aplikasi
  - koneksi.php                    # File konfigurasi koneksi database
  - artikel.html                   # Halaman artikel
  - autocomplete.php               # Fitur auto complete
  - careerbridge.sql               # Database
  - detail-artikel-1.php
  - detail-artikel-2.php
  - detail-artikel-3.php
  - detail-artikel-4.php
  - detail-artikel-5.php
  - detail-artikel-6.php
  - detail-artikel-7.php
  - detail-artikel-8.php
  - detail-artikel-9.php
  - detail-artikel-10.php
  - detail-artikel-11.php
  - detail-artikel-12.php
  - kebijakanprivasi.html          # Halaman kebijakan privasi
  - koneksi.php                    # File konfigurasi koneksi database
  - landingpage.php                # Landing page web CareerBrige
  - lupakatasandi.php              
  - pusatbantuan.html              # Halaman pusat bantuan
  - pusatbantuan-perusahaan.html
  - snk.html                       # Halaman syarat dan ketentuan
  - README.md                      # Dokumentasi proyek



Berikut adalah beberapa screenshot dari website CareerBridge:
1. Halaman Detail Pekerjaan:
   ![image](https://github.com/user-attachments/assets/4b3429cd-f0e3-45dc-aac3-b5b42a4810d3)


2. Dashboard Pelamar:
   ![image](https://github.com/user-attachments/assets/949f1b60-1388-4a9d-861e-094b5e4fc626)

3. Dashboard Perusahaan
   ![image](https://github.com/user-attachments/assets/f0917102-0614-44d2-96a9-9962521faf8f)


