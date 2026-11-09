-- Adds and backfills marketing descriptions for investment plans.
SET @description_column_exists := (
    SELECT COUNT(*)
    FROM INFORMATION_SCHEMA.COLUMNS
    WHERE TABLE_SCHEMA = DATABASE()
      AND TABLE_NAME = 'plan'
      AND COLUMN_NAME = 'description'
);
SET @add_description_sql := IF(
    @description_column_exists = 0,
    'ALTER TABLE `plan` ADD COLUMN `description` varchar(255) NOT NULL DEFAULT '''' AFTER `name`',
    'SELECT 1'
);
PREPARE add_description_statement FROM @add_description_sql;
EXECUTE add_description_statement;
DEALLOCATE PREPARE add_description_statement;

UPDATE `plan` SET `description` = 'Low risk introduction' WHERE LOWER(`name`) = LOWER('Starter');
UPDATE `plan` SET `description` = 'Medium-Term Growth' WHERE LOWER(`name`) = LOWER('Growth');
UPDATE `plan` SET `description` = 'Substantial Capital growth' WHERE LOWER(`name`) = LOWER('Pro');
UPDATE `plan` SET `description` = 'Exclusive for High Stake investors' WHERE LOWER(`name`) = LOWER('Elite');
