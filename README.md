# ONES (Not-only an ERP System)

ONES is a robust enterprise resource planning (ERP) and business management platform featuring an AngularJS frontend, a ThinkPHP (PHP) backend, and a MySQL database.

## Architecture Overview

- **Frontend (`ones/`)**: AngularJS single-page application built with Bootstrap, SCSS, and Grunt task automation.
- **Backend (`server/`)**: PHP RESTful API application powered by the ThinkPHP framework and Symfony components.
- **Database (`server/Application/Region/Schema/` & Migrations)**: Relational MySQL schema supporting dynamic data models, RBAC, workflows, and extensible modules.

---

## Prerequisites

Ensure your environment has the following installed:
- **Docker & Docker Compose** (Recommended for zero-friction setup)
- **PHP >= 7.4** (with `pdo_mysql`, `mbstring`, `gd`, `zip` extensions)
- **Composer** (PHP package manager)
- **Node.js >= 16.x & npm**

---

## Quick Start (Docker Containerization)

1. Clone the repository:
   ```bash
   git clone https://github.com/PreCogSecurity/ones.git
   cd ones
   ```

2. Copy the environment configuration:
   ```bash
   cp .env.example .env
   ```

3. Start the containers using Docker Compose:
   ```bash
   docker compose up -d --build
   ```

4. Access the application in your browser at `http://localhost:8080`.

---

## Manual Installation & Setup

1. **Database Setup**:
   Create a MySQL database named `ones`:
   ```sql
   CREATE DATABASE ones CHARACTER SET utf8 COLLATE utf8_general_ci;
   ```

2. **Backend Dependencies**:
   Navigate to the `server/` directory and install PHP dependencies via Composer:
   ```bash
   cd server
   composer install --no-interaction
   cd ..
   ```

3. **Frontend Build / Setup**:
   Install Node dependencies:
   ```bash
   npm install
   ```

4. **Run Installation**:
   Access the installer script at `server/install/install.php` or execute setup according to the installation guide (`server/install/Guide.md`).

---

## Running Tests & Quality Checks

- Run the automated test suite and lint tasks via Grunt:
  ```bash
  npm test
  ```

- PHP unit tests and migrations are managed under `server/`.

---

## Security & Contributions

- Report security vulnerabilities privately.
- Ensure all pull requests pass CI verification checks (`.github/workflows/ci.yml`).

## License

Licensed under the Apache License 2.0.
