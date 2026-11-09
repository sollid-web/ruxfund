-- Adds the drafted plans to an existing PostgreSQL/Supabase database.
-- Idempotent by plan name; does not alter existing plan records.
BEGIN;

INSERT INTO plan (type, name, percent, ref, min, max, num, calc)
SELECT 1, 'Growth', 3.0000, 10.0000, 2000.00, 9999.00, 14, 24
WHERE NOT EXISTS (SELECT 1 FROM plan WHERE lower(name) = lower('Growth'));

INSERT INTO plan (type, name, percent, ref, min, max, num, calc)
SELECT 1, 'Pro', 3.5000, 10.0000, 10000.00, 19999.00, 21, 24
WHERE NOT EXISTS (SELECT 1 FROM plan WHERE lower(name) = lower('Pro'));

INSERT INTO plan (type, name, percent, ref, min, max, num, calc)
SELECT 1, 'Elite', 5.0000, 10.0000, 20000.00, 100000.00, 30, 24
WHERE NOT EXISTS (SELECT 1 FROM plan WHERE lower(name) = lower('Elite'));

COMMIT;
