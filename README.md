# Laravel Sanctum Authentication & Posts API

## 🚀 Task Overview

A simple RESTful API built with **Laravel** and **Sanctum** for handling user authentication and blog post management.

---

## 🎯 Objective

- Implement user **authentication** using Laravel Sanctum.
- Allow users to **register**, **log in**, **view their profile**, and **log out**.
- Provide **CRUD operations** for managing blog posts.
- Restrict access to certain routes based on **authentication** and **ownership**.

---

## 📦 Features

### ✅ Authentication
- **Register** a new user.
- **Login** using email and password.
- **Logout** (token-based).
- **Get user details** (profile).

### 📝 Posts (CRUD)
- **Create Post**: `title`, `content` — *(Authenticated users only)*
- **List Posts**: Retrieve all posts — *(Authenticated users only)*
- **View Post**: View a specific post by `id`.
- **Update Post**: *(Only the owner of the post can update)*
- **Delete Post**: *(Only the owner of the post can delete)*

---

## 🛡️ API Protection

- All post-related routes are protected using **Laravel Sanctum**.
- Only the **owner** of a post can modify or delete it.
- Middleware checks ensure:
  - Only **authenticated users** can create, update, and delete posts.

---

## 🔧 Setup Instructions

1. **Clone the Repository**
   ```bash
   git clone https://github.com/abdelhamed19/momentum-assessment.git
   cd momentum-assessment
   composer install
   cp .env.example .env
   php artisan key:generate
   php artisan migrate --seed
