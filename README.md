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

## Fresh Supabase database
For a new, empty Supabase PostgreSQL project, run [supabase_schema.sql](supabase_schema.sql)
in the Supabase SQL Editor. This creates the app tables and baseline configuration;
it does not migrate existing users or transactions. New users will need to register.

Do not run [schema.sql](schema.sql) directly in Supabase: it uses MySQL syntax.
Update the seeded `site` settings, including `site_url` and contact email, before
using the site. Do not put database credentials in Git; configure them as hosting
provider environment variables instead.
