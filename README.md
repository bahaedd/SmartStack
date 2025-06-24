# 🧠 SmartStack — Modular Productivity Suite

**SmartStack** is a growing suite of modular web apps built with Laravel and TailwindCSS. It's designed to boost personal growth, productivity, and digital organization. Each app lives in its own domain (Goals, Habits, Journals...) but integrates into one powerful dashboard.

---

## 🗂️ Categories & Apps

### 🌱 Personal Development Pack

- 🎯 **Goal Tracker** — Plan, manage, and visualize your goals
- ✅ **Habit Builder** — Create and track daily/weekly habits
- 📓 **Journal App** — Reflect and write down your daily thoughts
- 🧘 **Mindfulness Timer** — Time meditation or focus sessions
- 📊 **Life Dashboard** — Visualize life metrics and balance
- 🗺️ **Milestone Map** — Break goals into actionable steps

> More categories and apps coming soon: productivity, finance, education, health, etc.

---

## ⚙️ Tech Stack

- **Laravel 12.x**
- **Tailwind CSS** + [Flowbite UI](https://flowbite.com/)
- **Alpine.js**
- **ApexCharts** (for data visualization)
- **Laravel Breeze** (auth + profile)

---

## 🚀 Getting Started

```bash
# 1. Clone the repo
git clone https://github.com/your-username/smartstack.git
cd smartstack

# 2. Install PHP dependencies
composer install

# 3. Install front-end assets
npm install && npm run dev

# 4. Configure environment
cp .env.example .env
php artisan key:generate

# 5. Migrate database
php artisan migrate

# 6. Run the app
php artisan serve
```

---

## 🧱 Project Structure

```
resources/views/
├── apps/                  # Each app lives here (goal, habit, journal, etc.)
│   ├── goal/
│   ├── habit/
│   └── journal/
├── profile/               # Laravel Breeze user settings
├── layouts/               # Navbar, sidebar, main layout
├── partials/              # Reusable UI elements
```

---

## ✨ Features

- Modular app design
- User authentication & profile settings
- Goal & milestone management
- Real-time charts and insights
- Dark mode UI
- Clean, responsive design using Flowbite + Tailwind

---

## 🛡️ Security

- Laravel Sanctum for session/auth
- Validation and CSRF protection
- Password and profile update with confirmation

---

## 📈 Charts & Visualization

Integrated with **ApexCharts**:

- Donut charts (goals progress)
- Line/bar charts (habits & time)
- Life dashboard summaries

---

## 📬 Feedback & Contribution

We welcome your suggestions and pull requests!

> Want to build a new app in the SmartStack pack? Open an issue or discussion with your idea.

---

## 📄 License

MIT License. See `LICENSE` file for details.

---

## 📸 Screenshot

> Coming soon…

---

## 🙋 Contact

Built with 💻 by [Bahaeddine].

- Email: [sihassi.bahaeddine@gmail.com]
