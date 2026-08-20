## My Portfolio website

My application using stack:

- [x] PHP 8.4
- [x] PHP-FPM
- [x] Nginx
- [x] SQLite3
- [x] PDO SQLite
- [x] msmtp
- [x] Docker
- [x] Render

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

## SQLite

SQLite database: `storage/database.sqlite`

---

## Render

Push the repository to GitHub.

Create a Render Web Service.

Render will detect:

`render.yaml`

The service uses:

PHP 8.4
Nginx
PHP-FPM
SQLite
msmtp

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
