-- Updates existing investment plans to the final ranges, returns, referral bonus, and durations.
BEGIN;

UPDATE plan
SET percent = 2.0000, ref = 10.0000, min = 200.00, max = 1999.00, num = 7, calc = 24
WHERE lower(name) = lower('Starter');

UPDATE plan
SET percent = 3.0000, ref = 10.0000, min = 2000.00, max = 9999.00, num = 14, calc = 24
WHERE lower(name) = lower('Growth');

UPDATE plan
SET percent = 3.5000, ref = 10.0000, min = 10000.00, max = 19999.00, num = 21, calc = 24
WHERE lower(name) = lower('Pro');

UPDATE plan
SET percent = 5.0000, ref = 10.0000, min = 20000.00, max = 100000.00, num = 30, calc = 24
WHERE lower(name) = lower('Elite');

COMMIT;
