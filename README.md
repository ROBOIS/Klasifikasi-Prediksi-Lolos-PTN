# Aplikasi Klasifikasi dan Prediksi Kelulusan PTN

Sistem informasi akademik yang dirancang untuk mengelola data siswa, mata pelajaran, nilai, dan melakukan prediksi kelulusan PTN menggunakan machine learning.

## 📋 Daftar Isi

- [Fitur Utama](#fitur-utama)
- [Cara Kerja Aplikasi](#cara-kerja-aplikasi)
- [Persyaratan Sistem](#persyaratan-sistem)
- [Instalasi](#instalasi)
- [Panduan Penggunaan](#panduan-penggunaan)
- [Teknologi](#teknologi)

## ✨ Fitur Utama

### 1. **Manajemen Data Siswa**
- Menambah, mengubah, dan menghapus data siswa
- Import data siswa dari file CSV
- Kelola informasi siswa (NIS, nama, status kurang mampu, dll)

### 2. **Manajemen Mata Pelajaran**
- Kelola daftar mata pelajaran
- Atur jenis penilaian (Tugas, UTS, UAS)

### 3. **Manajemen Nilai**
- Input nilai siswa per mata pelajaran
- Import nilai dari file CSV
- Klasifikasi nilai berdasarkan jenis (Tugas, UTS, UAS)
- Lihat rekap nilai semua siswa

### 4. **Prediksi Kelulusan PTN**
- Analisis probabilitas kelulusan siswa menggunakan Machine Learning
- Hasil prediksi berdasarkan nilai akademik dan status sosial
- Visualisasi hasil prediksi dengan curve ROC dan confusion matrix

### 5. **Manajemen Wali Kelas**
- Kelola data wali kelas
- Hubungkan wali kelas dengan data siswa

## 🔄 Cara Kerja Aplikasi

### Alur Sistem:

```
1. Input Data Siswa & Mata Pelajaran
   ↓
2. Input Nilai Siswa (Tugas, UTS, UAS)
   ↓
3. Sistem Menghitung Nilai Akhir
   ↓
4. Machine Learning Model Memprediksi Kelulusan PTN
   ↓
5. Output: Dashboard & Laporan Prediksi
```

### Komponen Utama:

**Database:**
- `siswas` - Tabel data siswa
- `mapels` - Tabel mata pelajaran
- `nilais` - Tabel nilai siswa
- `walikelas` - Tabel wali kelas
- `users` - Tabel pengguna sistem

**Backend (Laravel):**
- `SiswaController` - Mengelola CRUD siswa
- `MapelController` - Mengelola CRUD mata pelajaran
- `NilaiController` - Mengelola CRUD nilai
- `RekapNilaiController` - Tampilkan rekap nilai
- `WalikelasController` - Mengelola CRUD wali kelas

**Machine Learning (Python):**
- `logreg.py` - Model regresi logistik dasar
- `logreg_multinom.py` - Model multinomial logistic regression
- `logreg_roc_conf.py` - Evaluasi model dengan ROC curve dan confusion matrix

### Proses Prediksi:

1. **Pembacaan Data**: Ambil data nilai siswa dari database
2. **Preprocessing**: Normalisasi dan persiapan data
3. **Feature Engineering**: Hitung nilai rata-rata, agregat nilai per siswa
4. **Prediksi Model**: Gunakan trained model untuk prediksi
5. **Visualisasi**: Tampilkan hasil dengan metrics dan charts

## 📋 Persyaratan Sistem

- PHP >= 8.1
- Composer
- MySQL/MariaDB
- Python 3.8+
- Node.js (untuk frontend assets)

### Python Libraries:
- scikit-learn
- pandas
- numpy
- matplotlib

## 🚀 Instalasi

```bash
# Clone repository
git clone https://github.com/ROBOIS/Klasifikasi-Prediksi-Lolos-PTN.git
cd Klasifikasi-Prediksi-Lolos-PTN

# Install PHP dependencies
composer install

# Install JavaScript dependencies
npm install

# Copy environment file
cp .env.example .env

# Generate app key
php artisan key:generate

# Jalankan migration
php artisan migrate

# Seed database (opsional)
php artisan db:seed

# Jalankan aplikasi
php artisan serve
```

Akses aplikasi di `http://localhost:8000`

## 📖 Panduan Penggunaan

### Login
1. Buka aplikasi di browser
2. Login dengan credentials yang telah diseed

### Input Data Siswa
1. Navigasi ke menu "Siswa"
2. Klik "Tambah Siswa" atau import dari CSV
3. Isi data siswa dan simpan

### Input Nilai
1. Navigasi ke menu "Nilai"
2. Pilih siswa dan mata pelajaran
3. Masukkan nilai (Tugas, UTS, UAS)
4. Atau import nilai dari file CSV

### Lihat Prediksi
1. Navigasi ke menu "Probabilitas Lolos"
2. Sistem akan menampilkan hasil prediksi kelulusan PTN
3. Lihat grafik dan analisis untuk setiap siswa

## 💻 Teknologi

### Backend:
- **Laravel 11** - PHP Web Framework
- **MySQL** - Database
- **Blade** - Templating Engine

### Frontend:
- **HTML/CSS** - Markup & Styling
- **JavaScript** - Interaktif
- **Bootstrap** - UI Framework

### Machine Learning:
- **Python** - Data Processing & ML
- **Scikit-learn** - Machine Learning Library
- **Pandas** - Data Analysis
- **Matplotlib** - Visualization

## 📝 Lisensi

Proyek ini dilisensikan di bawah lisensi MIT.
