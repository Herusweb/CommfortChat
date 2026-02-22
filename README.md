🚀 CommfortChat

CommfortChat is a web-based chat application with private and group messaging, built as a fullstack project to demonstrate real-world development workflow and deployment.

The project focuses on clean architecture, modern frontend stack, and production-ready practices.

✨ Features

🔐 User authentication

💬 Private chats

👥 Group chats

🧑‍💼 Role-based access (Admin / User)

🧵 Message history with auto-scroll

⚡ Dynamic UI with Vue.js & Inertia

📱 Responsive design (Tailwind CSS)

🛠 Tech Stack

Backend

Laravel

MySQL

Eloquent ORM

REST API

Frontend

Vue.js

Inertia.js

Tailwind CSS

Axios

DevOps

Git & GitHub

Git Flow (main / develop)

Pull Requests

Deployed on dedicated server (Hetzner)

🧠 Development Process

This project was developed using a real-world Git workflow:

main – stable, production-ready branch

develop – active development

Features implemented incrementally

Regular Pull Requests with clear descriptions

Merge commits used to preserve development history

This approach helped keep the codebase clean and maintainable.

🚀 Deployment

The application is deployed to a dedicated Hetzner server.

Production setup:

Ubuntu 22.04

Nginx

PHP-FPM

MySQL

SSL via Let's Encrypt

The project runs in a production-like environment and is publicly accessible.

🔗 Live demo:
👉 [add your domain here]

⚙️ Installation (Local Setup)
git clone https://github.com/your-username/commfortchat.git
cd commfortchat

composer install
npm install

cp .env.example .env
php artisan key:generate

php artisan migrate
npm run dev
php artisan serve
📚 What I Learned

Building fullstack applications with Laravel & Vue.js

Client-server communication using Inertia.js

Working with REST APIs and Axios

Database relationships and access control

Git Flow and Pull Requests

Deploying applications to a Linux server

🎯 Project Goal

The goal of this project was to simulate a real development environment and demonstrate practical skills required for a Junior Frontend / Fullstack Developer position.

👤 Author

Your Name
Junior Fullstack Developer (Laravel / Vue.js)

GitHub: https://github.com/your-username

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
