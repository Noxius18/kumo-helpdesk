![Kumo Helpdesk Logo](https://drive.google.com/uc?id=1GBhXAG4FskccCpPioFF6U6DoQN3TUcVt)

---
# 📘 Repository Guideline
---

## 📜 Daftar Isi
- [📖 Pendahuluan](#-pendahuluan)
- [💻 Cara Install Node.js di Laragon](#-cara-install-nodejs-di-laragon)
  - [1. Buka Laragon](#1-buka-laragon)
  - [2. Cek Apakah Node.js Sudah Terinstal](#2-cek-apakah-nodejs-sudah-terinstal)
  - [3. Install Node.js](#3-install-nodejs)
  - [4. Verifikasi Node.js](#4-verifikasi-nodejs)
- [🛠️ Clone Repository](#-clone-repository)
  - [1. Menggunakan SSH](#1-menggunakan-ssh)
  - [2. Menggunakan HTTPS](#2-menggunakan-https)
- [🧩 Instalasi Project Laravel](#-instalasi-project-laravel)
  - [1. Install Dependencies](#1-install-dependencies)
    - [1.1 Composer](#11-composer)
    - [1.2 JS Depedencies (untuk tailwind)](#12-js-depedencies-untuk-tailwind)
  - [2. Generate Application Key](#2-generate-application-key)
  - [3. Konfigurasi file .env](#3-konfigurasi-file-env)
    - [3.1 Linux](#31-linux)
    - [3.2 Windows](#32-windows)
      - [Powershell](#powershell)
      - [CMD](#cmd)
  - [4. Migrasi](#4-migrasi)
  - [5. Serve Project](#5-serve-project)
- [🚀 Branching dan Commit git guidelines](#-branching-dan-commit-git-guidelines)
  - [1. Branching](#1-branching)
    - [1.1 Buat branch baru](#11-buat-branch-baru)
  - [2. Commit Message](#2-commit-message)
  - [3. Push code](#3-push-code)
    - [3.1 Pull branch (opsional)](#31-pull-branch-opsional)
---
## 📖 Pendahuluan
Selamat datang di repository project Laravel ini! Ikuti langkah-langkah berikut untuk mempersiapkan environment pengembangan lokal kalian. 

✅ **Pastikan kalian sudah memiliki:**
- **Git**
- **Composer**
- **PHP** (Project ini menggunakan PHP 8.3, jadi lebih baik menggunakan PHP 8.2 keatas)
- **Node JS**
---

## 💻 Cara Install Node.js di Laragon

Berikut adalah langkah-langkah untuk menginstal **Node.js** di **Laragon**.

### 1. Buka Laragon
Pastikan Laragon sudah terinstal dan berjalan di komputer kalian. Jika belum, kalian bisa mengunduhnya dari [situs resmi Laragon](https://laragon.org/download/).

### 2. Cek Apakah Node.js Sudah Terinstal
Sebelum menginstal Node.js, periksa apakah Node.js sudah terinstal di Laragon dengan cara berikut:

- Klik kanan pada ikon **Laragon** di system tray (pojok kanan bawah layar).
- Pilih **"Terminal"** untuk membuka terminal Laragon.
- Ketik perintah berikut di terminal:
  ```bash
  node -v
  ```

### 3. Install Node.js
- Klik kanan pada ikon **Laragon** di system tray, lalu pilih **Tools** > **Quick Add** > **Node.js**

### 4. Verifikasi Node.js
```bash
node -v # Output Versi Node.js
npm -v # Output Versi NPM
```

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
#### 1.1 Composer
``` bash
composer install
```

#### 1.2 JS Depedencies (untuk tailwind)
``` bash
npm install
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

### 5. Serve Project
```bash
npm run serve
```
> Catatan: Aplikasi akan berjalan di localhost pada port **2500**. Kalian dapat mengaksesnya dengan membuka browser dan memasukkan URL http://localhost:2500.
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
git commit -m "feat: Tambah fitur menghapus tiket"
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
