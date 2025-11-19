# 📝 Sistem Manajemen Tugas Sederhana (Task Manager)

---

## 📋 Fitur yang Diimplementasikan (Features Implemented)

### 🔑 Authentication
* **Registrasi** dan **Login** user.
* **Logout** dari sistem.

### ✅ Task Management (CRUD)
* Membuat tugas baru dengan **Judul**, **Deskripsi**, dan **Due Date**
* Melihat daftar tugas. (User melihat tugasnya sendiri, Admin melihat semua tugas
* Mengubah status tugas (**pending** -> **in progress** -> **completed**)
* Mengedit dan menghapus tugas

### 🔍 Query & Tampilan
* **Filter** tugas berdasarkan status (**pending, in-progress, completed**)
* **Search** tugas berdasarkan judul
* **Pagination** untuk Task List
* **Dashboard Sederhana** yang menampilkan statistik
* **Form Validation** dan **Flash Messages** (Success/Error)

---

## 🚀 Langkah-Langkah Instalasi (Installation Steps)

Ikuti langkah-langkah ini untuk menjalankan proyek secara lokal:

1.  **Clone Repository:**
    ```bash
    git clone [url-repository-anda] task-management
    cd task-management
    ```

2.  **Instal Dependensi:**
    ```bash
    composer install
    ```

3.  **Setup Lingkungan:**
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

4.  **Konfigurasi Database:**
    * Buat database baru di MySQL (misal: `task_manager_db`).
    * Edit file `.env` dengan kredensial database Anda (DB_DATABASE, DB_USERNAME, DB_PASSWORD).

5.  **Jalankan Migrasi dan Seeders:**
    ```bash
    php artisan migrate --seed
    ```
    (Ini akan membuat tabel dan mengisi data sample, termasuk Admin dan Regular Users).

6.  **Jalankan Server:**
    ```bash
    php artisan serve
    ```
    Akses aplikasi di `http://127.0.0.1:8000`.

---

## 🔑 Kredensial Login (Login Credentials)

Aplikasi ini dibuat dengan 1 user Admin dan 2 user Regular. Anda dapat login menggunakan kredensial berikut (dibuat via seeder):

| Role | Email | Password | Catatan |
| :--- | :--- | :--- | :--- |
| **Admin** | `admin@test.com` | `password` | Dapat melihat semua tugas. |
| **User Biasa 1** | `user1@test.com` | `password` | Hanya dapat melihat tugas yang dibuatnya sendiri. |
| **User Biasa 2** | `user2@test.com` | `password` | Hanya dapat melihat tugas yang dibuatnya sendiri. |

---