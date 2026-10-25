-- Adds the drafted plans to an existing MySQL database.
-- Idempotent by plan name; does not alter existing plan records.
INSERT INTO `plan` (`type`, `name`, `percent`, `ref`, `min`, `max`, `num`, `calc`)
SELECT 1, 'Growth', 2.0000, 5.0000, 100.00, 4999.00, 14, 24
WHERE NOT EXISTS (SELECT 1 FROM `plan` WHERE LOWER(`name`) = LOWER('Growth'));

INSERT INTO `plan` (`type`, `name`, `percent`, `ref`, `min`, `max`, `num`, `calc`)
SELECT 1, 'Pro', 2.5000, 5.0000, 5000.00, 24999.00, 30, 24
WHERE NOT EXISTS (SELECT 1 FROM `plan` WHERE LOWER(`name`) = LOWER('Pro'));

INSERT INTO `plan` (`type`, `name`, `percent`, `ref`, `min`, `max`, `num`, `calc`)
SELECT 1, 'Elite', 3.0000, 5.0000, 25000.00, 100000.00, 60, 24
WHERE NOT EXISTS (SELECT 1 FROM `plan` WHERE LOWER(`name`) = LOWER('Elite'));
