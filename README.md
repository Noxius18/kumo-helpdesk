# Project Guideline

### Install NodeJS (Kalo udah ada skip)
Link: https://nodejs.org/dist/v20.18.0/node-v20.18.0-x64.msi

> NodeJS disini buat library Laravel Mix (buat bundling assets CSS dan JS)

### Install git (kalo udah ada skip)
> Link: https://github.com/git-for-windows/git/releases/download/v2.46.2.windows.1/Git-2.46.2-64-bit.exe


## Git Guideline

### Setup config global git
```sh
git config --global user.name "username"
git config --global user.mail "email@domain.tld"
```

### Clone git dari repository ke lokal laptop kalian (pake HTTPS)
```sh
git clone https://github.com/Noxius18/kumo-helpdesk.git
```

### Branching
> Kalo udah clone repository ke lokal kalian, pastikan buat branch baru untuk menghindari konflik dengan branch main (branch main buat project final yang siap di deploy ke server)

#### Cek branch
```sh
git branch
```
**Contoh output**
```sh
noxius@Eridanus:~/Documents/Project/kumo-helpdesk$ git branch
* main
```

#### Buat branch baru
```sh
git branch branch-baru
```

#### Pindah antar branch
```sh
git checkout branch-baru
```
**Contoh Output**
```sh
noxius@Eridanus:~/Documents/Project/kumo-helpdesk$ git checkout test
M       README.md
Switched to branch 'test'
```
**!!WARN**
> Saat pindah branch, perhatikan logo asterisk * pindah ke branch yang baru, yang mana pada awalnya berada di "main" sekarang berpindah ke branch "test"

**Contoh output**
```sh
noxius@Eridanus:~/Documents/Project/kumo-helpdesk$ git branch
  main
* test
```

### Push file
```sh
git push file1.txt file2.txt # push per-file
git push . # push semua file yang sudah diedit, tidak rekomen
```
### Commit file
```sh
git commit -m "Tambah fitur baru"
```

> Pastikan push dan commit berada di branch yang sesuai (usahakan jangan langsung ke branch main)

> Commit file disini buat memberi pesan atau alasan apa saja yang sudah di edit di dalam file, semisal ada fitur baru nah kalian tulis apa fiturnya

### Push file ke github
```sh
git push origin nama-branch 
# Pastikan di branch yang sesuai
# jangan langsung ke branch main
```
**Contoh output**
```sh
noxius@Eridanus:~/Documents/Project/kumo-helpdesk$ git push origin main
Enumerating objects: 5, done.
Counting objects: 100% (5/5), done.
Delta compression using up to 4 threads
Compressing objects: 100% (3/3), done.
Writing objects: 100% (3/3), 1.23 KiB | 420.00 KiB/s, done.
Total 3 (delta 1), reused 0 (delta 0), pack-reused 0
remote: Resolving deltas: 100% (1/1), completed with 1 local object.
To github.com:Noxius18/kumo-helpdesk.git
   15d2c61..85af795  main -> main
```

### Untuk check status git apakah ada di staging, siap push dan lain lain
```sh
git status
```
**Contoh output**
```sh
noxius@Eridanus:~/Documents/Project/kumo-helpdesk$ git status
On branch test
Changes to be committed:
  (use "git restore --staged <file>..." to unstage)
        modified:   README.md
```
