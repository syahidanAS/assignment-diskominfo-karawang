**CARA MENGGUNAKAN**
1. git clone https://github.com/syahidanAS/assignment-diskominfo-karawang.git
2. composer install
3. Buat database baru 
4. sesuaikan file .env
5. php artisan migrate
6. php artisan db:seed --class=ScreeningsTableseeder
7. php artisan serve
8. Proyek ini menggunakan Vite untuk menjalankan migration, silahkan ketikkan perintah: npm run dev

**AKUN LOGIN**
Emai: admin@labkesda.karawangkab.go.id
Password: password


**MENGGUNAKAN API**
GET Detail Data http://localhost:8000/api/v1/custmers/idclear


