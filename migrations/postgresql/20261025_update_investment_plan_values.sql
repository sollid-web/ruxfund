-- Updates existing investment plans to the approved ranges and total returns.
-- Deliberately leaves ref, num, and calc unchanged so durations remain the same.
BEGIN;

UPDATE plan
SET percent = 3.5000, min = 200.00, max = 1999.00
WHERE lower(name) = lower('Starter');

UPDATE plan
SET percent = 12.0000, min = 2000.00, max = 9999.00
WHERE lower(name) = lower('Growth');

UPDATE plan
SET percent = 22.0000, min = 10000.00, max = 19999.00
WHERE lower(name) = lower('Pro');

UPDATE plan
SET percent = 38.0000, min = 20000.00, max = 100000.00
WHERE lower(name) = lower('Elite');

COMMIT;
