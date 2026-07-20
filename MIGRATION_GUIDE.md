# MIGRASI TIMUNMAS: Laravel 5.4 + Firebird → Laravel 10 + MySQL

## 📋 Summary Migrasi

Project **timunmas** (Laravel 5.4 + Firebird) telah berhasil dimigrasi ke **timunmas_new** (Laravel 10 + MySQL).

### Yang Sudah Dikerjakan

#### ✅ Models (6 models)
- `app/Models/Barang.php`
- `app/Models/Customer.php`
- `app/Models/Order.php`
- `app/Models/OrderDetail.php`
- `app/Models/Approval.php`
- `app/Models/Pengguna.php`

**Perubahan:**
- Namespace: `App\` → `App\Models\`
- Menambahkan `HasFactory` trait
- Menambahkan relationships (hasMany, belongsTo)
- Menambahkan `$fillable`, `$casts`, `$primaryKey`, `$timestamps`
- Nama tabel di-lowercase untuk MySQL convention

#### ✅ Migrations (6 tables)
- `2026_07_18_142950_create_mst_pengguna_table.php`
- `2026_07_18_142952_create_customer_table.php`
- `2026_07_18_142953_create_barang_table.php`
- `2026_07_18_142954_create_mst_ord_jual_table.php`
- `2026_07_18_142956_create_det_ord_jual_table.php`
- `2026_07_18_142957_create_minta_appr_table.php`

**Struktur Database:**
- Semua tabel menggunakan lowercase naming
- Foreign keys ditambahkan dengan proper constraints
- Data types disesuaikan untuk MySQL

#### ✅ Controllers (6 controllers)
- `BarangController.php` - List & detail barang
- `CustomerController.php` - List & detail customer
- `OrderController.php` - CRUD order dengan transaction
- `ApprovalController.php` - List & approve
- `DashboardController.php` - Dashboard summary
- `UserController.php` - Login/logout

**Modernisasi:**
- Raw query → Eloquent ORM
- Session-based auth tetap dipertahankan (custom)
- Validasi dipindahkan ke controller (siap direfactor ke Form Request)
- DB::transaction untuk order creation
- Error handling dengan try-catch

#### ✅ Routes
- File: `routes/web.php`
- Menggunakan Laravel 10 syntax (controller array notation)
- Route grouping dengan middleware `auth.session`
- Named routes untuk semua endpoints

#### ✅ Middleware
- `CheckSessionAuth.php` - Custom session auth check
- Registered di `app/Http/Kernel.php` sebagai `auth.session`

#### ✅ Views & Assets
- Semua 18 blade files sudah dicopy
- Public assets (css, js) sudah dicopy
- Layouts folder sudah tersedia

#### ✅ Seeders (3 seeders)
- `PenggunaSeeder.php` - 2 users (admin/admin123, user1/user123)
- `CustomerSeeder.php` - 3 dummy customers
- `BarangSeeder.php` - 5 dummy products

---

## 🚀 Langkah Setup Project Baru

### 1. Konfigurasi Database MySQL

Edit file `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=timunmas_new
DB_USERNAME=root
DB_PASSWORD=your_mysql_password
```

### 2. Buat Database

```bash
mysql -u root -p
CREATE DATABASE timunmas_new CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
EXIT;
```

### 3. Jalankan Migration & Seeder

```bash
cd /Users/user/fawaid/timunmas_new

# Jalankan migration
php artisan migrate

# Jalankan seeder (optional - untuk data dummy)
php artisan db:seed
```

### 4. Testing Login

**Default Credentials:**
- Username: `admin`
- Password: `admin123`

atau

- Username: `user1`
- Password: `user123`

### 5. Jalankan Development Server

```bash
php artisan serve
```

Akses: `http://localhost:8000/login`

---

## 🔄 Perbedaan Major Laravel 5.4 vs Laravel 10

### 1. **Authentication**
- **Lama:** Custom session auth dengan Firebird `f_ibpassword()`
- **Baru:** Custom session auth dengan `Hash::check()` standard Laravel

### 2. **Database**
- **Lama:** Firebird dengan raw SQL query
- **Baru:** MySQL dengan Eloquent ORM

### 3. **Models Location**
- **Lama:** `app/ModelName.php`
- **Baru:** `app/Models/ModelName.php`

### 4. **Route Syntax**
- **Lama:** `Route::get('/', 'Controller@method')`
- **Baru:** `Route::get('/', [Controller::class, 'method'])`

### 5. **Middleware Registration**
- **Lama:** `app/Http/Kernel.php` dengan `$routeMiddleware`
- **Baru:** `app/Http/Kernel.php` dengan `$middlewareAliases`

---

## ⚠️ Yang Perlu Diperhatikan

### 1. **Password Migration**
Firebird menggunakan fungsi custom `f_ibpassword()` untuk password. Di Laravel 10, saya sudah gunakan `Hash::make()` standard.

**Action Required:**
- Jika ada data user existing di Firebird, password perlu di-rehash menggunakan `Hash::make()`
- Atau buat script migration khusus untuk convert password

### 2. **Data Migration dari Firebird**
Project ini hanya **struktur dan logic**, belum termasuk migrasi data dari Firebird ke MySQL.

**Untuk migrasi data:**
```bash
# Export dari Firebird
# Import ke MySQL dengan mapping table yang sesuai
```

### 3. **View/Blade Files**
Blade files sudah dicopy, tapi mungkin perlu adjustment minor karena:
- Nama field database mungkin case-sensitive
- Relasi model bisa dimanfaatkan untuk simplifikasi view

### 4. **Validasi**
Validasi saat ini masih di controller. Untuk best practice Laravel 10:
```bash
php artisan make:request StoreOrderRequest
# Pindahkan validasi dari controller ke Form Request
```

---

## 📊 Testing Checklist

- [ ] Login berhasil dengan credentials dari seeder
- [ ] Dashboard menampilkan count barang, customer, order
- [ ] List barang menampilkan semua data dari seeder
- [ ] Detail barang bisa diakses
- [ ] List customer menampilkan data
- [ ] List order (kosong karena belum ada data order)
- [ ] Form tambah order bisa diakses
- [ ] Simpan order berhasil dengan transaction
- [ ] List approval menampilkan data hari ini
- [ ] Logout berhasil dan redirect ke login

---

## 🛠️ Rekomendasi Next Steps

### 1. **Refactor Validasi ke Form Request**
```bash
php artisan make:request StoreOrderRequest
php artisan make:request LoginRequest
```

### 2. **Gunakan API Resources untuk Response**
```bash
php artisan make:resource BarangResource
php artisan make:resource OrderResource
```

### 3. **Implementasi Queue untuk Task Berat**
Jika ada export, email notifikasi, dll:
```bash
php artisan make:job SendOrderNotification
```

### 4. **Testing**
```bash
php artisan make:test OrderControllerTest
php artisan make:test UserAuthTest
```

### 5. **Setup Redis untuk Queue & Cache**
Edit `.env`:
```env
CACHE_DRIVER=redis
QUEUE_CONNECTION=redis
SESSION_DRIVER=redis
```

---

## 📝 File Structure Comparison

```
timunmas (Laravel 5.4)          timunmas_new (Laravel 10)
├── app/                        ├── app/
│   ├── Barang.php             │   ├── Models/
│   ├── Customer.php           │   │   ├── Barang.php
│   ├── Order.php              │   │   ├── Customer.php
│   └── Http/Controllers/      │   │   ├── Order.php
│                              │   │   ├── OrderDetail.php
│                              │   │   ├── Approval.php
│                              │   │   └── Pengguna.php
│                              │   ├── Http/
│                              │   │   ├── Controllers/
│                              │   │   └── Middleware/
│                              │   │       └── CheckSessionAuth.php
├── database/                   ├── database/
│   └── migrations/            │   ├── migrations/ (6 files)
│                              │   └── seeders/ (4 files)
├── routes/                     ├── routes/
│   └── web.php                │   └── web.php (modern syntax)
└── resources/                  └── resources/
    └── views/                     └── views/ (same)
```

---

## 💡 Tips

1. **Jangan lupa** `.env` harus dikonfigurasi sesuai environment
2. **Backup database** Firebird sebelum migrasi data production
3. **Test thoroughly** sebelum deploy ke production
4. **Monitor performance** setelah migrasi (MySQL vs Firebird query speed)
5. **Setup logging** untuk track error production

---

## 🆘 Troubleshooting

### Error: "SQLSTATE[HY000] [1045] Access denied"
**Solution:** Cek kredensial MySQL di `.env`

### Error: "Class 'App\Order' not found"
**Solution:** Namespace salah, harusnya `App\Models\Order`

### Error: "419 Page Expired" saat submit form
**Solution:** Tambahkan `@csrf` di semua form

### Session tidak persist setelah login
**Solution:** 
- Cek `SESSION_DRIVER` di `.env`
- Pastikan folder `storage/framework/sessions/` writable

---

**Migrasi Completed:** 18 Juli 2026
**PHP Version:** 8.2.4
**Laravel Version:** 10.x
**Database:** MySQL 8.0+
