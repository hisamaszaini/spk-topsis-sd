# Sistem Rekomendasi Lomba SD (Lite Edition)

Sistem Pendukung Keputusan (SPK) ini merupakan versi **"Lite"** yang dirancang untuk kemudahan penggunaan dalam menentukan rekomendasi lomba bagi siswa Sekolah Dasar. Versi ini menghilangkan fitur Sub-Kriteria untuk mempercepat proses input penilaian secara langsung.

## 🚀 Perbedaan Utama (Lite vs Standard)

- **Tanpa Sub-Kriteria**: Anda tidak perlu mendefinisikan skala nilai terlebih dahulu. Nilai (seperti 80, 90, 75) diinputkan langsung saat proses penilaian.
- **Lebih Cepat**: Mengurangi langkah konfigurasi awal.
- **Fleksibel**: Penilai memiliki kebebasan penuh dalam memberikan skor numerik untuk setiap kriteria.

## 🛠️ Fitur

- **Dashboard**: Statistik ringkas data kriteria dan siswa.
- **Manajemen Kriteria**: Kelola kriteria penilaian (Benefit/Cost) dan bobot.
- **Data Siswa**: Manajemen data peserta lomba.
- **Penilaian Langsung**: Input skor numerik untuk setiap siswa per kriteria.
- **Analisis TOPSIS**: Perhitungan otomatis menggunakan metode TOPSIS.
- **Ranking**: Hasil rekomendasi akhir berdasarkan skor tertinggi.

## 📦 Panduan Instalasi (Lokal)

1. **Clone Repository**
   ```bash
   git clone https://github.com/hisamaszaini/spk-sd.git
   cd spk-sd
   ```

2. **Instalasi**
   ```bash
   composer install
   npm install && npm run build
   cp .env.example .env
   php artisan key:generate
   ```

3. **Database**
   ```bash
   php artisan migrate --seed
   ```

4. **Jalankan**
   ```bash
   php artisan serve
   ```

---
**SPK SD Lite** © 2026.
