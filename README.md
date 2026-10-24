# Ruxfund deployment notes

## Environment variables
Copy `.env.example` to `.env` and update the values for your hosting environment.

```bash
cp .env.example .env
```

For Wasmer, configure these values as application environment variables in the
Wasmer project settings. Wasmer does not automatically load a committed `.env`
file into the PHP process. Do not commit production credentials.

Required production variables:

- `DB_HOST`
- `DB_PORT` (use the Supabase session pooler port, normally `5432`)
- `DB_USERNAME`
- `DB_PASSWORD`
- `DB_NAME`

After setting or changing them, redeploy the app and verify that the home page
contains the configured site name and that an invalid login returns a normal
credential error rather than an authentication-service error.

The application reads the following variables in [includes/server.php](includes/server.php):
- `DB_HOST`
- `DB_PORT`
- `DB_USERNAME`
- `DB_PASSWORD`
- `DB_NAME`

## Database import
Import the SQL dump in [faq.sql](faq.sql) into your database before testing the site.
