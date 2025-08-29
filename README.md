# Project README

## Project Name

TB Files API

---

## Overview

This project is a Laravel 12 application with a web dashboard and API endpoints secured with Laravel Sanctum. It allows users to view a summary of vendors and their invoices. Also to create invoices, get vendors summaries and get invoices. 

---

## System Architecture Overview and Design Decisions

The project is built using Laravel 12 for the backend and Blade templates for the frontend. The API is secured with Laravel Sanctum for token-based authentication. 

Key design decisions:
- **Web & API separation**: Routes in `web.php` handle the dashboard, while `api.php` handles API requests.
- **Session + Sanctum token**: Users authenticate via the web, generating an API token stored in session for dashboard API calls.
- **SQLite / MySQL support**: Migrations allow easy setup for local development.




---

## Prerequisites

* PHP >= 8.1
* Database (SQLite, or as configured in .env)

---

## Installation

1. **Clone the repository**

```bash
git clone https://github.com/holandavinicius/tbfiles-challenge
cd tbfiles-challenge
```

2. **Install PHP dependencies**

```bash
composer install
```

3. **Configure environment**

```bash
cp .env.example .env
php artisan key:generate
```

* Edit `.env` to configure your database connection and Sanctum settings:

```
DB_CONNECTION=sqlite
DB_DATABASE=database/database.sqlite

SANCTUM_STATEFUL_DOMAINS=127.0.0.1,localhost
```

---

## Database Setup

1. **Run migrations**

```bash
php artisan migrate
```

2. **Seed database**

```bash
php artisan db:seed
```

3. **Import invoices**

```bash
php artisan app:import-invoices
```

---

## Running the Application

```bash
php artisan serve
```

* Access the dashboard: `http://127.0.0.1:8000`
* Use the login form to authenticate and generate API token for vendors summary.

---

## Usage

* The dashboard automatically fetches vendor summaries using the API token.
* API routes are secured with Sanctum; you can use the token to make authenticated requests.
* Example API endpoint: `/api/vendors/summaries`

---



