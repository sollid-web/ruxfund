-- Updates existing investment plans to the approved ranges and total returns.
-- Deliberately leaves ref, num, and calc unchanged so durations remain the same.
START TRANSACTION;

UPDATE `plan`
SET `percent` = 3.5000, `min` = 200.00, `max` = 1999.00
WHERE LOWER(`name`) = LOWER('Starter');

UPDATE `plan`
SET `percent` = 12.0000, `min` = 2000.00, `max` = 9999.00
WHERE LOWER(`name`) = LOWER('Growth');

UPDATE `plan`
SET `percent` = 22.0000, `min` = 10000.00, `max` = 19999.00
WHERE LOWER(`name`) = LOWER('Pro');

UPDATE `plan`
SET `percent` = 38.0000, `min` = 20000.00, `max` = 100000.00
WHERE LOWER(`name`) = LOWER('Elite');

COMMIT;
