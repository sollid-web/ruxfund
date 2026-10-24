# Ruxfund deployment notes

## Environment variables
Copy `.env.example` to `.env` and update the values for your hosting environment.

```bash
cp .env.example .env
```

The application reads the following variables in [includes/server.php](includes/server.php):
- `DB_HOST`
- `DB_USERNAME`
- `DB_PASSWORD`
- `DB_NAME`

## Database import
Import the SQL dump in [faq.sql](faq.sql) into your database before testing the site.
