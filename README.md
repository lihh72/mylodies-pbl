# 🎵 MyLodies – Music Equipment Rental Platform

**MyLodies** is a web-based rental platform for musical instruments built with Laravel. Designed as part of a Project-Based Learning (PBL) initiative, it provides an end-to-end solution for renting, managing, and browsing music equipment online.

🌐 **Live Demo**: [https://mylodies.xyz](https://mylodies.xyz)

---

## 🚀 Features

- 🛒 Browse and rent musical instruments
- 🧾 Cart & Checkout system with rental date selection
- 🔐 User authentication (register/login)
- 🎛️ Admin dashboard for managing instruments and rentals
- 📬 Order tracking and rental history
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

---

Thanks for checking out **MyLodies**! If you like this project, please consider giving it a ⭐️ on GitHub.
