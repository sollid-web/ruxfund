-- Adds the drafted plans to an existing MySQL database.
-- Idempotent by plan name; does not alter existing plan records.
INSERT INTO `plan` (`type`, `name`, `percent`, `ref`, `min`, `max`, `num`, `calc`)
SELECT 1, 'Growth', 12.0000, 5.0000, 2000.00, 9999.00, 14, 24
WHERE NOT EXISTS (SELECT 1 FROM `plan` WHERE LOWER(`name`) = LOWER('Growth'));

INSERT INTO `plan` (`type`, `name`, `percent`, `ref`, `min`, `max`, `num`, `calc`)
SELECT 1, 'Pro', 22.0000, 5.0000, 10000.00, 19999.00, 30, 24
WHERE NOT EXISTS (SELECT 1 FROM `plan` WHERE LOWER(`name`) = LOWER('Pro'));

INSERT INTO `plan` (`type`, `name`, `percent`, `ref`, `min`, `max`, `num`, `calc`)
SELECT 1, 'Elite', 38.0000, 5.0000, 20000.00, 100000.00, 60, 24
WHERE NOT EXISTS (SELECT 1 FROM `plan` WHERE LOWER(`name`) = LOWER('Elite'));
