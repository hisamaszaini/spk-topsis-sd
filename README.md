# Sistem Rekomendasi Lomba Siswa SD

Sistem Pendukung Keputusan (SPK) ini dirancang untuk kemudahan penggunaan dalam menentukan rekomendasi lomba bagi siswa Sekolah Dasar. Versi ini menggunakan input penilaian secara langsung untuk mempercepat proses evaluasi.

## 🚀 Keunggulan

- **Input Langsung**: Anda tidak perlu mendefinisikan sub-kriteria. Nilai (seperti 80, 90, 75) diinputkan langsung saat proses penilaian.
- **Efisien**: Mengurangi langkah konfigurasi awal yang rumit.
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
   git clone https://github.com/hisamaszaini/spk-topsis-sd.git
   cd spk-topsis-sd
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
**Sistem Rekomendasi Lomba SD** © 2026.
