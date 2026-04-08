# Sistem Rekomendasi Lomba Siswa SD (Metode TOPSIS)

Sistem Pendukung Keputusan (SPK) ini dirancang untuk memudahkan penentuan rekomendasi lomba bagi siswa Sekolah Dasar menggunakan metode **TOPSIS**. Versi ini dirancang agar sangat mudah digunakan dengan input penilaian langsung.

---

## 🛠️ Persyaratan Utama (Wajib Instal)

Sebelum menjalankan aplikasi, pastikan komputer Anda sudah terinstal aplikasi berikut:
1.  **XAMPP** atau **Laragon**: Untuk menjalankan server database (MySQL) dan PHP..
2.  **Composer**: Alat untuk mendownload pustaka Laravel.
3.  **Node.js & NPM**: Untuk mengelola tampilan aplikasi.
4.  **Visual Studio Code (VS Code)**: Aplikasi utama untuk mengedit kode dan menjalankan perintah.

---

## 🚀 Panduan Instalasi (Menggunakan VS Code)

Ikuti langkah-langkah di bawah ini secara berurutan:

### Langkah 1: Siapkan Folder Project
*   Bagi Anda yang mendownload file **ZIP**:
    1. Klik tombol hijau **Code** di atas, lalu pilih **Download ZIP**.
    2. Ekstrak file tersebut ke folder pilihan Anda, misalnya: `C:\Project\spk-topsis-sd`.

### Langkah 2: Buka Project di VS Code
1. Jalankan aplikasi **VS Code**.
2. Klik menu **File** > **Open Folder...**
3. Pilih folder project `spk-topsis-sd` yang tadi sudah disiapkan.
4. Klik **Select Folder**.

### Langkah 3: Buka Terminal di VS Code
Ini adalah tempat Anda akan mengetikkan perintah-perintah selanjutnya:
1. Di menu atas VS Code, klik **Terminal** > **New Terminal**.
2. Akan muncul jendela hitam di bagian bawah VS Code. Pastikan kursor sudah siap mengetik di sana.

### Langkah 4: Install Library (Pustaka)
Ketik perintah ini di Terminal VS Code dan tekan **Enter**:
```bash
composer install
```

### Langkah 5: Atur File Pengaturan (.env)
1. Di panel kiri VS Code (Explorer), cari file bernama `.env.example`.
2. Klik kanan file tersebut, pilih **Copy**, lalu klik kanan lagi di area kosong dan pilih **Paste**.
3. Klik kanan file hasil copy (`.env.example copy`), pilih **Rename**, lalu ubah namanya menjadi `.env`.
4. Klik file `.env` tersebut untuk membukanya di editor.
5. Cari tulisan `DB_DATABASE=spk_saw`, ubah menjadi `DB_DATABASE=spk_topsis_sd`.

   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=spk_topsis_sd
   DB_USERNAME=root
   DB_PASSWORD=
   ```
   *(Kosongkan password jika Anda menggunakan XAMPP/Laragon default)*.

6. Simpan perubahan dengan menekan **Ctrl + S**.

### Langkah 6: Buat Kunci Aplikasi
Kembali ke Terminal VS Code di bawah, ketik:
```bash
php artisan key:generate
```

### Langkah 7: Siapkan Database di phpMyAdmin
1. Buka **XAMPP Control Panel**, pastikan tombol **Start** pada **Apache** dan **MySQL** sudah diklik (berwarna hijau).
2. Buka browser dan buka alamat: `http://localhost/phpmyadmin`.
3. Klik menu **New** di sisi kiri.
4. Isi nama database: `spk_topsis_sd`, lalu klik **Create**.

### Langkah 8: Masukkan Struktur Data
Di Terminal VS Code, ketik perintah ini untuk membuat tabel otomatis:
```bash
php artisan migrate --seed
```

### Langkah 9: Proses Tampilan (Frontend)
Ketik perintah ini di Terminal VS Code (pastikan internet lancar):
```bash
npm install
npm run build
```

---

## 💻 Cara Menjalankan Aplikasi

Kapanpun Anda ingin membuka aplikasi, buka project di VS Code lalu jalankan perintah ini di Terminal:
```bash
php artisan serve
```
Aplikasi akan berjalan di alamat: `http://127.0.0.1:8000`. Buka alamat tersebut di browser Anda.

---

## 🔑 Informasi Login

| Peran (Role) | Email | Password |
| :--- | :--- | :--- |
| **Administrator** | `admin@admin.com` | `admin123` |
| **User Biasa** | `user@user.com` | `user123` |

---

## ✨ Fitur Aplikasi
- **Dashboard**: Statistik kriteria & siswa.
- **Kriteria**: Atur bobot dan jenis kriteria (Benefit/Cost).
- **Data Siswa**: Manajemen nama peserta lomba.
- **Penilaian**: Input skor nilai langsung.
- **Hasil Ranking**: Rekomendasi otomatis berdasarkan metode TOPSIS.

---
**Sistem Rekomendasi Lomba SD** © 2026.
