# Tomodacuy
Media sosial sederhana berbasiskan MySQL Replication dan ArangoDB untuk memenuhi tugas Basis Data Terdistribusi

## Arsitektur
![Diagram](https://user-images.githubusercontent.com/24503760/146660558-b83c3687-8af7-48e6-bda0-5cc23485438a.png)

Catatan :
- Biru menandakan instance aplikasi, merah menandakan instance database

## Deployment
1. Clone repositori
2. Rename file .env.example menjadi .env
3. Ganti variable pada .env untuk instance ArangoDB dan MySQL yang dimilliki
4. Buat database **tomodacuy** di instance ArangoDB dan MySQL
5. Lakukan `composer install` untuk menginstall dependencies yang diperlukan
6. Lakukan `php vendor/bin/phoenix migrate` untuk menjalankan migrasi MySQL menggunakan Phoenix
7. Dari browser, jalankan `/db/arango/Init.php` untuk menjalankan migrasi ArangoDB
