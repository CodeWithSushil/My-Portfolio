## My Portfolio website

My application using stack:

- [x] PHP 8.5
- [x] PHP-CLI
- [x] SQLite3
- [x] PDO SQLite
- [x] msmtp
- [x] Docker (Debian-based)
- [x] Render

---

## Tech Stack

### PHP Extensions
- **zip** - Archive handling
- **mbstring** - Multibyte string functions
- **intl** - Internationalization support
- **pdo** - PHP Data Objects
- **pdo_sqlite** - SQLite database driver
- **opcache** - Performance optimization

### System Dependencies (Debian-based)
- curl
- unzip
- git
- libzip-dev
- libonig-dev
- libicu-dev
- sqlite3

---

## Local development

Copy:

.env.example

to:

.env

```bash
cp .env.example .env
```

Then configure SMTP credentials.

Run:

```bash
docker compose up --build
```

Open:

```bash
http://localhost:10000
```

---

## Docker

The application uses a **Debian-based PHP 8.5 CLI image** for better compatibility and standard library support.

### Dockerfile Features
- Base image: `php:8.5-cli` (Debian)
- All PHP extensions pre-installed
- Composer dependency management
- Production-optimized build with `--no-dev` flag
- Layer caching for faster rebuilds

### Building the Docker Image

```bash
docker build -t sushilkumar .
```

### Running the Docker Container

```bash
docker run -p 10000:10000 sushilkumar
```

---

## SQLite

SQLite database: `storage/database.sqlite`

---

## Render

Push the repository to GitHub.

Create a Render Web Service.

Render will detect:

`render.yaml`

The service uses:

- PHP 8.5
- CLI Server
- SQLite
- msmtp

The SQLite database is stored on a Render persistent disk.

Health check:

`/health`

---

## SMTP

Configure:

msmtprc

```
SMTP_HOST=gmail
SMTP_PORT=25
SMTP_USER= your name
SMTP_PASSWORD= password
SMTP_FROM= email
```

---

[![Deploy Portfolio](https://github.com/CodeWithSushil/sushilkumar/actions/workflows/deploy.yml/badge.svg)](https://github.com/CodeWithSushil/sushilkumar/actions/workflows/deploy.yml)

Portfolio Site: [Visit 👀](https://sushilkumar.onrender.com)
