# Timunmas - Laravel 10

> Sistem Manajemen Order & Inventory - Upgraded dari Laravel 5.4 ke Laravel 10

## 📌 Tech Stack

- **Framework:** Laravel 10.x
- **PHP:** 8.2.4+
- **Database:** MySQL 8.0+
- **Authentication:** Custom Session-based Auth

## 🚀 Quick Start

### 1. Install Dependencies

```bash
composer install
```

### 2. Environment Setup

```bash
cp .env.example .env
php artisan key:generate
```

### 3. Database Configuration

Edit `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=timunmas_new
DB_USERNAME=root
DB_PASSWORD=your_password
```

### 4. Create Database

```bash
mysql -u root -p -e "CREATE DATABASE timunmas_new CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"
```

### 5. Run Migrations & Seeders

```bash
php artisan migrate
php artisan db:seed
```

### 6. Start Development Server

```bash
php artisan serve
```

Visit: `http://localhost:8000/login`

## 🔑 Default Credentials

**Admin:**
- Username: `admin`
- Password: `admin123`

**User:**
- Username: `user1`
- Password: `user123`

## 📂 Project Structure

```
timunmas_new/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── ApprovalController.php
│   │   │   ├── BarangController.php
│   │   │   ├── CustomerController.php
│   │   │   ├── DashboardController.php
│   │   │   ├── OrderController.php
│   │   │   └── UserController.php
│   │   └── Middleware/
│   │       └── CheckSessionAuth.php
│   └── Models/
│       ├── Approval.php
│       ├── Barang.php
│       ├── Customer.php
│       ├── Order.php
│       ├── OrderDetail.php
│       └── Pengguna.php
├── database/
│   ├── migrations/
│   │   ├── 2026_07_18_142950_create_mst_pengguna_table.php
│   │   ├── 2026_07_18_142952_create_customer_table.php
│   │   ├── 2026_07_18_142953_create_barang_table.php
│   │   ├── 2026_07_18_142954_create_mst_ord_jual_table.php
│   │   ├── 2026_07_18_142956_create_det_ord_jual_table.php
│   │   └── 2026_07_18_142957_create_minta_appr_table.php
│   └── seeders/
│       ├── BarangSeeder.php
│       ├── CustomerSeeder.php
│       ├── DatabaseSeeder.php
│       └── PenggunaSeeder.php
├── resources/
│   └── views/
│       ├── dashboard.blade.php
│       ├── login.blade.php
│       ├── listbarang.blade.php
│       ├── detailbarang.blade.php
│       ├── listcustomer.blade.php
│       ├── detailcustomer.blade.php
│       ├── listorder.blade.php
│       ├── detailorder.blade.php
│       ├── tambahorder.blade.php
│       ├── formorder.blade.php
│       ├── listapproval.blade.php
│       └── layouts/
└── routes/
    └── web.php
```

## 🎯 Features

### Dashboard
- Summary count: Barang, Customer, Order
- Quick navigation

### Master Data
- **Barang (Products):** List, detail, stock tracking
- **Customer:** List, detail, contact info

### Transactions
- **Order:** Create, list, detail order penjualan
- **Order Detail:** Multiple items per order
- **Approval:** List pending approvals, approve transactions

### User Management
- Login/Logout
- Session-based authentication
- Password hashing dengan bcrypt

## 📊 Database Tables

| Table | Description |
|-------|-------------|
| `mst_pengguna` | User accounts |
| `customer` | Customer master data |
| `barang` | Product/inventory master |
| `mst_ord_jual` | Sales order header |
| `det_ord_jual` | Sales order details |
| `minta_appr` | Approval requests |

## 🔧 Development Commands

```bash
# Run migrations
php artisan migrate

# Rollback migrations
php artisan migrate:rollback

# Refresh database (drop all tables & migrate)
php artisan migrate:fresh

# Seed database with dummy data
php artisan db:seed

# Fresh install (migrate + seed)
php artisan migrate:fresh --seed

# Create new controller
php artisan make:controller NamaController

# Create new model
php artisan make:model NamaModel -m

# Clear cache
php artisan cache:clear
php artisan config:clear
php artisan route:clear
```

## 📝 API Endpoints

All routes are defined in `routes/web.php`:

### Public Routes
- `GET /login` - Login form
- `POST /loginPost` - Login handler

### Protected Routes (requires auth.session)
- `GET /` - Dashboard
- `GET /logout` - Logout

**Barang:**
- `GET /listbarang` - List all products
- `GET /detailbarang/{kdbrg}` - Product detail

**Customer:**
- `GET /listcustomer` - List all customers
- `GET /detailcustomer/{kdcust}` - Customer detail

**Order:**
- `GET /listorder` - List all orders
- `GET /tambahorder` - Create order form (v1)
- `GET /tambahorder2` - Create order form (v2)
- `GET /simpanorder` - Save order
- `GET /detailorder/{noent}` - Order detail

**Approval:**
- `GET /listapproval` - List pending approvals
- `GET /approve/{nomor}` - Approve request

## 🛡️ Security

- Password hashing dengan `Hash::make()` dan `Hash::check()`
- CSRF protection enabled
- Session-based authentication
- Middleware untuk protected routes
- Input validation di controller

## 📖 Migration Guide

Lihat file `MIGRATION_GUIDE.md` untuk detail lengkap proses migrasi dari Laravel 5.4 + Firebird ke Laravel 10 + MySQL.

## 🐛 Troubleshooting

### Error: "SQLSTATE[HY000] [1045] Access denied"
Cek kredensial MySQL di file `.env`

### Error: "Class not found"
Jalankan: `composer dump-autoload`

### Session tidak persist
Pastikan `SESSION_DRIVER=file` di `.env` dan folder `storage/framework/sessions/` writable

### 419 Page Expired
Tambahkan `@csrf` token di semua form POST

## 📧 Support

Untuk pertanyaan atau issue, silakan hubungi tim development.

## 📄 License

Proprietary - Internal Use Only

---

**Version:** 2.0.0 (Laravel 10)  
**Migrated:** 18 Juli 2026  
**Original Version:** 1.0.0 (Laravel 5.4)
