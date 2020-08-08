<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

# Tutorial Github

## Download Aplikasi Melalui Github

1. Lakukan Clone Repository

```
git clone https://github.com/Harun1804/Inventory.git
```

2. Masuk ke directory

```
cd Inventory
```

### Jika Ada Perubahan File

1. Check Terlebih Dahulu File Apa Saja Yang Berubah

```
git status
```

2. Tambahkan Semua File Yang diubah

```
git add .
```

3. Lakukan Commit Untuk Jika Tidak Ada Perubahan

```
git commit -m "Komentar Anda"
```

4. Upload Ke Repository

```
git push origin master
```

## Jika Aplikasi Sudah Ada Dikomputer dan Mendownload Menggunakan git clone

1. Masuk Ke Folder Repository Yang Ada Di Komputer Anda
2. Mengambil Data Dari Repository

```
git pull origin master
```

# Tutorial Penggunaan Laravel

1. Install Composer Terlebih Dahulu <br>
   [Download disini](https://getcomposer.org/download/)
2. Install Packagenya Terlebih Dahulu

```
composer install
```

3. Copy isi file .env.example

```
cp .env.example .env
```

4. Generate Key Baru

```
php artisan key:generate
```

5. Buatlah database kosong di phpmyadmin dengan nama **_ db_inventori _**
6. Kemudian Database Tersebut Atur Di File .env pada bagian DB_DATABASE
7. Lakukan Migrasi Database

```
php artisan migrate
```

8. Jalankan aplikasi

```
php artisan serve
```
