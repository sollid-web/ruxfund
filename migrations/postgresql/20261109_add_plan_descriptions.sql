-- Adds and backfills marketing descriptions for investment plans.
BEGIN;

ALTER TABLE plan
    ADD COLUMN IF NOT EXISTS description varchar(255) NOT NULL DEFAULT '';

UPDATE plan SET description = 'Low risk introduction' WHERE lower(name) = lower('Starter');
UPDATE plan SET description = 'Medium-Term Growth' WHERE lower(name) = lower('Growth');
UPDATE plan SET description = 'Substantial Capital growth' WHERE lower(name) = lower('Pro');
UPDATE plan SET description = 'Exclusive for High Stake investors' WHERE lower(name) = lower('Elite');

COMMIT;
