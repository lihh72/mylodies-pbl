# 🎵 MyLodies – Music Equipment Rental Platform

**MyLodies** is a web-based rental platform for musical instruments built with Laravel. Designed as part of a Project-Based Learning (PBL) initiative, it provides an end-to-end solution for renting, managing, and browsing music equipment online.

🌐 **Live Demo**: [https://mylodies.xyz](https://mylodies.xyz)
---
### 🎥 Video Presentation ATS

Watch the following video to see our **Mylodies ATS Presentation**:

📺 **(https://youtu.be/vmJ5tgw7KoM?si=GzlIusCsIgKYCPz2)**

---

### 🎥 Video Presentation AAS

Watch the following video to see our **Mylodies** AAS Presentation:

📺 **(https://youtu.be/KHEu5I1_FMc?si=s7GAIEVC4Dnndmim)**

---

### 🎥 Video Demonstration

Watch the following video to see how our **Mylodies** application works in action:

📺 **(https://www.youtube.com/watch?si=EGRMdg3OpToR99I9&v=bhf8SkPGy7c&feature=youtu.be)**

---

## 👥 Project Contributors – Mylodies

| Name                      | NIM         | Role                                             | GitHub Username     |
|---------------------------|-------------|--------------------------------------------------|---------------------|
| M.Falih Hilmy             | 3312401040  | Lead Backend Developer & Database Integration    | [`@lihh72`](https://github.com/lihh72)           |
| Bunga Citra Lestari Situmorang             | 3312401034  | Designer & Frontend Developer         | [`@bbbunga`](https://github.com/bbbunga)         |
| Birgita Anastasya Hutabarat    | 3312401045  | Designer & Frontend Developer             | [`@wayjuU`](https://github.com/wayjuU)           |
| Lidya Nur Raudhatul Janah Putri Rial      | 3312401046  | Designer & Frontend Developer  | [`@lidya046`](https://github.com/lidya046)   |

---

## 🚀 Features

- 🛒 Browse and rent musical instruments
- 🧾 Cart & Checkout system with rental date selection
- 🔐 User authentication (register/login)
- 🎛️ Admin dashboard for managing instruments and rentals
- 📬 Order tracking and rental history
- 💬 Integrated chatbot for user assistance
- 💡 Responsive UI built with Tailwind CSS & Blade

---

## 🛠️ Built With

- PHP 8+ / Laravel Framework
- Blade Templating Engine
- Tailwind CSS & Vite
- MySQL or SQLite
- Composer & NPM
- Laravel Octane (FrankenPHP) for production deployment

---

## ⚙️ Installation

```bash
# Clone the repository
git clone https://github.com/lihh72/mylodies-pbl.git
cd mylodies-pbl

# Install dependencies
composer install
npm install

# Set up environment
cp .env.example .env
php artisan key:generate

# Configure .env for your database
# Run migrations and seeders (optional)
php artisan migrate
php artisan db:seed

# Start development server
npm run dev
php artisan serve
```

Access the app at `http://localhost:8000`

---

## 📦 Production Deployment

1. Build frontend assets:
   ```bash
   npm run build
   ```

2. Set up virtual host pointing to `/public`

3. Configure environment and database

4. Run:
   ```bash
   php artisan migrate --force
   ```

---

## 🧪 Testing

Run the test suite:

```bash
php artisan test
```

---

## 🤝 Contributing

Contributions are welcome!

1. Fork this repository
2. Create a branch: `git checkout -b feature/YourFeature`
3. Commit your changes: `git commit -m 'Add some feature'`
4. Push to the branch: `git push origin feature/YourFeature`
5. Open a Pull Request

---

## 📬 Contact

- Author: [@lihh72](https://github.com/lihh72)
- Email: falihhilmy72@gmail.com
- WhatsApp: +62 822-3001-9821

---

## ✅ Project Status

| Feature                  | Status |
|--------------------------|--------|
| Rental flow              | ✅     |
| User authentication      | ✅     |
| Admin dashboard          | ✅     |
| Responsive frontend      | ✅     |
| Deployment ready         | ✅     |
| Chatbot integration      | ✅     |

---

Thanks for checking out **MyLodies**! If you like this project, please consider giving it a ⭐️ on GitHub.
