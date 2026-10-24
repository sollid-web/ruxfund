# Migrating ruxfund from MySQL/MariaDB to Supabase (PostgreSQL)

## Step 1 — Create the Supabase project (manual, do this yourself)
1. Go to https://supabase.com and sign in.
2. Click **New project**.
3. Enter a project name, set a strong database password, and pick a region.
4. Once created, go to **Project Settings → Database → Connection string** and
   copy the **URI** (use the "Session" pooler on port `5432`, not the
   "Transaction" pooler on `6543` — pgloader needs a persistent session).

## Step 2 — Run the migration
The migration script is ready at [migrate_to_supabase.load](migrate_to_supabase.load).

1. Edit that file and replace:
   - `YOUR_SUPABASE_DB_PASSWORD` with your Supabase database password
   - `YOUR_PROJECT_REF` with your Supabase project ref (from the connection string)
2. Make sure the local MariaDB `ruxfund` database is running (it already is,
   with user `ruxfund_user`).
3. Run:
   ```bash
   pgloader migrate_to_supabase.load
   ```
   `pgloader` is already installed (`pgloader --version` → 3.6.7).

pgloader will connect directly to MariaDB, convert the schema (backticks →
double quotes, `AUTO_INCREMENT` → sequences, `tinyint`/`datetime` → PostgreSQL
equivalents), and load both structure and data into the Supabase Postgres
database in one pass — no separate dump/convert step needed.

## Step 3 — Point the app at Supabase
`includes/server.php` currently uses `mysqli_connect`, which only works with
MySQL/MariaDB. To use Supabase Postgres you also need to switch the app's
database layer to `pg_connect`/PDO `pgsql`, since mysqli cannot talk to
Postgres. Let me know if you want that code change made too.
