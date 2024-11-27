# 📘 Repository Guideline
---

## 📜 Daftar Isi
1. [Pendahuluan](#pendahuluan)
2. [Clone Repository](#clone-repository)
   - [1. Menggunakan SSH](#1-menggunakan-ssh)
   - [2. Menggunakan HTTPS](#2-menggunakan-https)
3. [Instalasi Project Laravel](#instalasi-project-laravel)
   - [1. Install Dependencies](#1-install-dependencies)
   - [2. Generate Application Key](#2-generate-application-key)
   - [3. Konfigurasi file `.env`](#3-konfigurasi-file-env)
     - [3.1 Linux](#31-linux)
     - [3.2 Windows](#32-windows)
       - [Powershell](#powershell)
       - [CMD](#cmd)
   - [4. Migrasi](#4-migrasi)
4. [Branching dan Commit Git Guidelines](#branching-dan-commit-git-guidelines)
   - [1. Branching](#1-branching)
     - [1.1 Buat Branch Baru](#11-buat-branch-baru)
   - [2. Commit Message](#2-commit-message)
   - [3. Push Code](#3-push-code)
     - [3.1 Pull Branch (Opsional)](#31-pull-branch-opsional)
---
## 📖 Pendahuluan
Selamat datang di repository project Laravel ini! Ikuti langkah-langkah berikut untuk mempersiapkan environment pengembangan lokal kalian. 

✅ **Pastikan kalian sudah memiliki:**
- **Git**
- **Composer**
- **PHP** (yang kompatibel dengan Laravel)
---

## 🛠️ Clone Repository
Kalian bisa memilih untuk meng-clone repository ini menggunakan **SSH** atau **HTTPS**.

### 1. Menggunakan SSH
```bash
git clone git@github.com:Noxius18/kumo-helpdesk.git
```

### 2. Menggunakan HTTPS
``` bash
git clone https://github.com/Noxius18/kumo-helpdesk.git
```
---
## 🧩 Instalasi Project Laravel
Setelah berhasil di clone, kalian bisa ikuti langkah ini terlebih dahulu sebelum mengerjakan projectnya

### 1. Install Dependencies
``` bash
composer install
```

### 2. Generate Application Key
``` bash
php artisan key:generate
```

### 3. Konfigurasi file .env
#### 3.1 Linux
``` bash
cp .env-example .env
```
#### 3.2 Windows
- Powershell
``` powershell
Copy-Item .env-example .env
```
- CMD
``` cmd
copy .env-example .env
```

### 4. Migrasi
```bash
php artisan migrate
```
---
## 🚀 Branching dan Commit git guidelines
### 1. Branching
> ⚠️ WARNING!
> 🚫 Branch master hanya untuk produksi. Jangan langsung push ke branch master! 🚫

#### 1.1 Buat branch baru
``` bash
git checkout -b <branch-baru>
```

### 2. Commit Message
Pastikan untuk membuat pesan commit mengikuti format seperti ini
- ```feat:``` untuk penambahan fitur baru
- ```fix: ``` untuk perbaikan pada fitur
- ```docs: ``` untuk perubahan pada dokumentasi
- ```style: ``` untuk perubahan format (semisal penambahan style baru pada cssnya)

**Contoh** 
```bash
git comiit -m "feat: Tambah fitur menghapus tiket"
```

### 3. Push code
> ⚠️ WARNING!
> 🚫 Branch master hanya untuk produksi. Jangan langsung push ke branch master! 🚫

```bash
git push origin <nama-branch>
```
#### 3.1 Pull branch (opsional)
ini berguna untuk menarik code dari branch lain ke device lokal kalian
```bash
git pull origin <nama-branch>
```