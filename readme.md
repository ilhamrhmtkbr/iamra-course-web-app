# Iamra Course - Platform Pembelajaran Online

<div align="center">

![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![React](https://img.shields.io/badge/React-20232A?style=for-the-badge&logo=react&logoColor=61DAFB)
![Docker](https://img.shields.io/badge/Docker-2496ED?style=for-the-badge&logo=docker&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![MongoDB](https://img.shields.io/badge/MongoDB-4EA94B?style=for-the-badge&logo=mongodb&logoColor=white)
![Redis](https://img.shields.io/badge/Redis-DC382D?style=for-the-badge&logo=redis&logoColor=white)
![Nginx](https://img.shields.io/badge/Nginx-009639?style=for-the-badge&logo=nginx&logoColor=white)
![AWS](https://img.shields.io/badge/AWS-232F3E?style=for-the-badge&logo=amazon-aws&logoColor=white)

[![GitHub license](https://img.shields.io/github/license/yourusername/olcourse?style=flat-square)](https://github.com/yourusername/olcourse/blob/main/LICENSE)
[![GitHub stars](https://img.shields.io/github/stars/yourusername/olcourse?style=flat-square)](https://github.com/yourusername/olcourse/stargazers)
[![GitHub forks](https://img.shields.io/github/forks/yourusername/olcourse?style=flat-square)](https://github.com/yourusername/olcourse/network)
[![GitHub issues](https://img.shields.io/github/issues/yourusername/olcourse?style=flat-square)](https://github.com/yourusername/olcourse/issues)
[![GitHub pull requests](https://img.shields.io/github/issues-pr/yourusername/olcourse?style=flat-square)](https://github.com/yourusername/olcourse/pulls)

**Platform pembelajaran online lengkap dengan arsitektur mikroservice modern**

</div>

---

## 🚀 Tentang Project

Iamra Course adalah platform e-learning berbasis mikroservice yang dibangun untuk menampilkan kemampuan saya dalam programming. Project ini menggunakan teknologi modern dan best practices dalam pengembangan aplikasi web.

### 💡 Mengapa Project Ini?
- **Portfolio Showcase**: Menunjukkan pemahaman mendalam tentang arsitektur software
- **Microservices Implementation**: Implementasi mikroservice berbasis role untuk optimasi AWS Free Tier (agar hemat container)
- **DevOps Integration**: CI/CD, monitoring, dan deployment automation

## 🛠️ Tech Stack

### Backend
- **Laravel Framework** dengan Roadrunner
- **Arsitektur Mikroservice** (berdasarkan role, bukan service/fitur)
- **Laravel Reverb** untuk fitur real-time chat
- **Laravel Queue & Horizon** untuk background processing
- **JWT Authentication** untuk keamanan API

### Frontend
- **React.js** untuk semua interface pengguna
- **Multiple SPAs** untuk setiap role pengguna

### Infrastructure & DevOps
- **Docker & Docker Compose** untuk kontainerisasi
- **Nginx** sebagai reverse proxy dan load balancer (lb untuk dev aja, buat belajar)
- **GitHub Actions** untuk CI/CD pipeline
- **AWS Deployment** (dioptimasi untuk Free Tier)

### Database & Storage
- **MySQL** untuk data utama (masih shared db)
- **MongoDB** untuk fitur forum/chat
- **Redis** untuk caching

### Monitoring
- **Prometheus** untuk metrics collection (hanya di local dev, untuk belajar)
- **Grafana** untuk dashboard monitoring (hanya di local dev, untuk belajar)
- **Node Exporter** untuk system metrics (hanya di local dev, untuk belajar)
- **K6** untuk load testing (di terapkan di ci)

### Third-Party Integrations
- **Midtrans** untuk payment processing dan instructor payouts (beneficiaries/withdraw)
- **Google OAuth** untuk autentikasi di frontend untuk mendapatkan cred email, tetap menggunakan jwt
- **Google Recaptcha** untuk validasi apakah bukan robot
- **Slack** untuk logging dan notifikasi
- **Ngrok** untuk development tunneling

### Fitur Tambahan
- **DomPDF** untuk generate PDF
- **ImageMagick** untuk image processing
- Real-time notifications dan chat
- Email queue processing
- Dokumentasi API lengkap di docs/api

## 📁 Struktur Project

```
olcourse/
├── 🔄 .github/workflow/             # Konfigurasi CI/CD
├── 🚀 backend-api-forum/            # Mikroservice Forum (Laravel)
├── 🎓 backend-api-instructor/       # Mikroservice Instructor (Laravel)
├── 🌐 backend-api-public/           # API Public (Laravel)
├── 👨‍🎓 backend-api-student/          # Mikroservice Student (Laravel)
├── 👤 backend-api-user/             # User Management (Laravel)
├── 🐳 docker/                       # Konfigurasi Docker
│   ├── dev/                         # Environment Development
│   ├── prod/                        # Environment Production
│   └── stag-mobile/                 # Environment Test Mobile
├── 📚 docs/                         # Dokumentasi API (OpenAPI)
├── 🖥️ frontend-user/                # Frontend User Management (React)
├── 👨‍🏫 frontend-instructor/          # Dashboard Instructor (React)
├── 🎯 frontend-student/             # Portal Student (React)
├── 🌍 frontend-public/              # Website Public (React)
├── 💬 frontend-forum/               # Frontend Forum (React)
├── 📊 set-grafana/                  # Setup Grafana monitoring
├── ⚡ set-k6/                        # Konfigurasi K6 load testing
└── 📈 set-prometheus/               # Setup Prometheus monitoring
```

## ✨ Fitur Utama

### 👨‍🎓 Untuk Student
- 📖 Browse dan enrollment kursus
- 💳 Payment processing via Midtrans
- 📊 Tracking progress dan mendapatkan sertifikat
- 💬 Forum interaktif real-time chat dengan instructor/student lainnya

### 👨‍🏫 Untuk Instructor
- ✏️ Buat dan kelola kursus
- 💰 Mendapatkan penghasilan
- 📞 Komunikasi real-time dengan student
- 📊 Analytics dashboard rating, questions, reviews

### 🌟 Platform Features
- 🔐 Multi-role authentication system
- 🔔 Email verifikasi notifikasi
- 🔍 Comprehensive search functionality
- 📱 Mobile-responsive design
- 🔌 API-first architecture

## 📋 Prerequisites

Sebelum memulai, pastikan Anda memiliki:

### 1. **Akun Midtrans** untuk payment processing:
- **Student payments**: Snap, Payment APIs
- **Instructor payouts**: Payouts, Beneficiaries, Withdraw Fund APIs
- ⚠️ Registrasi khusus diperlukan untuk fitur payout

### 2. **Akun Ngrok** dengan token autentikasi

### 3. **Google Cloud Console** untuk OAuth:
- Kunjungi [Google Cloud Console](https://console.cloud.google.com/)
- Setup project-id dan api key sesuaikan di masing masing env
- Setup credentials untuk OAuth integration
- Setup recaptcha untuk frontend , android, backend. Untuk frontend kunjungi [Recaptcha V2](https://www.google.com/recaptcha/admin) dan untuk backend/android bisa [Recaptcha Enterprise Api](https://console.cloud.google.com/security/recaptcha)

### 4. **Slack Workspace** untuk logging dan notifikasi

## 🚀 Cara Memulai

### 1. 🔧 Konfigurasi Environment

**Setup Docker Compose:**
```bash
cd docker/dev
cp docker-compose-untuk-dev-example.yaml docker-compose.yaml
```
- Sesuaikan Ngrok token di service ngrok
- Sesuaikan Ngrok token di service frontend-user

**Konfigurasi Backend:**
```bash
cd docker/dev/backend-laravel/_shared
cp .env-example.shared .env.shared
```
Sesuaikan:
- MAIL settings
- APP_PUBLIC_FRONTEND_URL (dari step 4)
- APP_STUDENT_FRONTEND_URL (dari step 4)
- LOG_SLACK_WEBHOOK_URL
- JWT_SECRET (generate setelah container pertama jalan)

**Konfigurasi Frontend:**
```bash
cd docker/dev/frontend-react
cp .env-example.shared .env.shared
```

**Konfigurasi API Individual:**
- Rename `.env.example` ke `.env` di setiap folder backend API
- Sesuaikan variable Midtrans untuk student dan instructor APIs

### 2. 🏃‍♂️ Jalankan Aplikasi

```bash
cd docker/dev
sudo docker compose -f docker-compose.yaml up -d
```

### 3. 🔑 Setup Pertama Kali (Wajib)

**Generate JWT Secret:**
```bash
sudo docker container exec -it backend-api-user sh
php artisan jwt:secret
```
- Copy JWT_SECRET dari `backend-api-user/.env`
- Paste ke `docker/dev/backend-laravel/_shared/.env.shared`

### 4. 🌐 Konfigurasi Ngrok (Wajib setiap session)

**Akses Ngrok Dashboard:**
- Buka `localhost:9123` di browser
- Klik tombol "Visit" untuk dapatkan public URL

**Update Konfigurasi:**
- Copy Ngrok URL (contoh: `https://0df89e0367cd.ngrok-free.app`)
- Update `docker/dev/frontend-react/.env.shared`
- Sesuaikan Midtrans payment notification callback URL

### 5. 🗄️ Setup Database

```bash
sudo docker container exec -it backend-api-public sh
php artisan migrate:fresh --seed
```

### 6. 📊 Setup Monitoring (Opsional)

**Akses Grafana:**
- Buka `localhost:4000` di browser
- Login: admin / admin123

### 7. ⚡ Load Testing (Opsional)

**K6 Testing:**
- Masuk ke folder `set-k6`
- Ikuti instruksi di `script-jalan.txt`

## 📊 Monitoring & Analytics

Platform dilengkapi dengan solusi monitoring komprehensif:

- **📈 Grafana Dashboards**: Real-time system metrics dan application performance
- **📊 Prometheus Metrics**: Custom application metrics dan system monitoring
- **⚡ K6 Load Testing**: Performance testing dan identifikasi bottleneck
- **💬 Slack Integration**: Real-time alerts dan logging

## 🎯 Keputusan Arsitektur

### Mengapa Mikroservice Berbasis Role?
Arsitektur mikroservice berbasis role dipilih untuk:
- 🏆 **Optimasi AWS Free Tier**: Memaksimalkan resource yang terbatas
- 🔧 **Separation of Concerns**: Setiap service memiliki tanggung jawab yang jelas
- 📈 **Scalability**: Mudah di-scale per role sesuai kebutuhan
- 🛡️ **Security**: Isolasi akses data berdasarkan role pengguna

### Optimasi Performa
- **🚀 FrankenPHP**: Performa Laravel setara Node.js/Go
- **⚡ Redis Caching**: Response time lebih cepat, reduced database load
- **🔄 Queue Processing**: Async handling untuk email dan operasi berat
- **⚖️ Nginx Load Balancing**: Distribusi request yang efisien

### Fitur Keamanan
- 🔐 JWT-based authentication di semua services
- 👥 Role-based access control
- 💳 Secure payment processing integration
- 🔒 Rate Limiter

## 📚 Resource Tambahan

- [📖 Panduan Konfigurasi Nginx](https://www.notion.so/NGINX-untuk-AWS-Free-Tier-Production-23cc2b461c0f8031b73dc57a4a928f92) - Dokumentasi custom Nginx setup
- 📋 Dokumentasi API tersedia di `/docs/open-api/`

## 🚀 Deployment

Aplikasi mendukung automated deployment melalui:
1. **Development**: Git push ke branch dev trigger GitHub Actions
2. **Production**: Merge ke branch main deploy ke AWS
3. **Infrastructure**: Docker-based deployment dengan konfigurasi per environment

## 💼 Portfolio Highlight

Project ini mendemonstrasikan expertise dalam:

- ✅ **Microservices Architecture Design**
- ✅ **Container Orchestration & DevOps Practices**
- ✅ **Full-Stack Web Development**
- ✅ **Third-Party Service Integration**
- ✅ **Monitoring & Performance Optimization**
- ✅ **Cloud Deployment Strategies**
- ✅ **Payment Gateway Integration**
- ✅ **Real-time Communication Implementation**
- ✅ **Queue Management & Background Processing**
- ✅ **Security Best Practices**

---

<div align="center">

**🔥 Dibangun dengan passion untuk menunjukkan kemampuan software development 🔥**
</div>