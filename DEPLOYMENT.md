# Deployment Rebox

## Persyaratan

- PHP 8.1 atau lebih baru
- MySQL/MariaDB
- Ekstensi PHP: `bcmath`, `ctype`, `curl`, `dom`, `fileinfo`, `mbstring`, `openssl`, `pdo_mysql`, `tokenizer`, `xml`, dan `zip`
- Document root domain diarahkan ke folder `public`
- HTTPS aktif. Kamera QR tidak dapat digunakan melalui HTTP biasa.

## Langkah Deployment

```bash
composer install --no-dev --optimize-autoloader
cp .env.example .env
php artisan key:generate
php artisan migrate --force
php artisan storage:link
php artisan optimize
```

Pastikan web server dapat menulis ke:

```text
storage/
bootstrap/cache/
```

Isi konfigurasi database, email, `APP_URL`, dan kredensial Google pada `.env`. Callback Google harus sama persis dengan:

```text
https://domain-anda.com/auth/google/callback
```

## Catatan

- Jangan mengunggah `.env`, `vendor`, `node_modules`, atau symlink `public/storage` dari komputer lokal.
- Buat `public/storage` di server menggunakan `php artisan storage:link`.
- Proyek saat ini tidak memanggil `@vite`, sehingga halaman utama tidak bergantung pada hasil `npm run build`.
- Setelah mengubah `.env`, jalankan `php artisan optimize:clear` lalu `php artisan optimize`.
- Jalankan test hanya pada database testing terpisah yang ditetapkan di `phpunit.xml`.
