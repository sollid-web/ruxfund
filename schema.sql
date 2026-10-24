-- Ruxfund application schema reconstructed from the PHP data access paths.
SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

CREATE TABLE IF NOT EXISTS `site` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL DEFAULT 'Ruxfund',
  `site_url` varchar(255) NOT NULL DEFAULT 'http://127.0.0.1:8000',
  `url_name` varchar(150) NOT NULL DEFAULT 'Ruxfund',
  `email` varchar(255) NOT NULL DEFAULT 'admin@example.com',
  `admin` varchar(255) NOT NULL DEFAULT 'admin@example.com',
  `address` varchar(255) NOT NULL DEFAULT '',
  `phone` varchar(80) NOT NULL DEFAULT '',
  `image_link` varchar(255) NOT NULL DEFAULT '',
  `reg` varchar(255) NOT NULL DEFAULT '',
  `btc` decimal(20,8) NOT NULL DEFAULT 0,
  `dep` decimal(12,2) NOT NULL DEFAULT 0,
  `withdraw` decimal(12,2) NOT NULL DEFAULT 0,
  `min_with` decimal(12,2) NOT NULL DEFAULT 10,
  `max_with` decimal(12,2) NOT NULL DEFAULT 1000000,
  `cardfee` decimal(12,2) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `country` varchar(100) NOT NULL DEFAULT 'Not Available',
  `time` bigint NOT NULL DEFAULT 0,
  `active` tinyint NOT NULL DEFAULT 1,
  `transfer` tinyint NOT NULL DEFAULT 0,
  `2fa` tinyint NOT NULL DEFAULT 0,
  `max` decimal(12,2) NOT NULL DEFAULT 0,
  `msg` text,
  `kyc` tinyint NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `plan` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `type` tinyint NOT NULL DEFAULT 1,
  `name` varchar(150) NOT NULL,
  `percent` decimal(12,4) NOT NULL DEFAULT 0,
  `ref` decimal(12,4) NOT NULL DEFAULT 0,
  `min` decimal(12,2) NOT NULL DEFAULT 10,
  `max` decimal(12,2) NOT NULL DEFAULT 1000000,
  `num` int NOT NULL DEFAULT 1,
  `calc` int NOT NULL DEFAULT 24,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `transaction` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `sender` int NOT NULL DEFAULT 0,
  `receiver` varchar(100) NOT NULL DEFAULT 'x',
  `amount` decimal(20,8) NOT NULL DEFAULT 0,
  `type` varchar(50) NOT NULL DEFAULT '',
  `plan` int DEFAULT NULL,
  `paidby` varchar(50) DEFAULT NULL,
  `coin` varchar(20) DEFAULT NULL,
  `status` tinyint DEFAULT 0,
  `show_bonus` tinyint NOT NULL DEFAULT 1,
  `time` bigint NOT NULL DEFAULT 0,
  `updated` bigint NOT NULL DEFAULT 0,
  `closed` tinyint NOT NULL DEFAULT 0,
  `closetime` bigint DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `transaction_sender` (`sender`),
  KEY `transaction_type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `referral` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user` varchar(100) NOT NULL,
  `ref` varchar(100) NOT NULL,
  `time` bigint NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `referral_ref` (`ref`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `kyc` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `phone` varchar(80) NOT NULL DEFAULT '',
  `address` varchar(255) NOT NULL DEFAULT '',
  `state` varchar(100) NOT NULL DEFAULT '',
  `country` varchar(100) NOT NULL DEFAULT '',
  `image` varchar(255) NOT NULL DEFAULT '',
  `userid` int NOT NULL DEFAULT 0,
  `status` tinyint NOT NULL DEFAULT 0,
  `time` bigint NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `kyc_userid` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `wallet` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user` int NOT NULL DEFAULT 0,
  `wallet` varchar(255) NOT NULL DEFAULT '',
  `type` varchar(50) NOT NULL DEFAULT '',
  `time` bigint NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `wallet_user` (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `sitewallet` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `sitewallet_type_unique` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `fak` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `users` int NOT NULL DEFAULT 0,
  `deposit` decimal(20,2) NOT NULL DEFAULT 0,
  `withdraw` decimal(20,2) NOT NULL DEFAULT 0,
  `days` int NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `faq` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `question` varchar(1000) NOT NULL,
  `answer` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `test` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL DEFAULT '',
  `testimony` text NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `msg` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL DEFAULT '',
  `subject` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `msg` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `card` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `sender` int NOT NULL DEFAULT 0,
  `type` varchar(80) NOT NULL DEFAULT '',
  `address` varchar(255) NOT NULL DEFAULT '',
  `status` tinyint NOT NULL DEFAULT 0,
  `time` bigint NOT NULL DEFAULT 0,
  `name` varchar(150) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `flow` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL DEFAULT 'admin',
  `password` varchar(255) NOT NULL DEFAULT '',
  `code` varchar(255) NOT NULL DEFAULT 'admin_code',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `site` (`id`, `name`, `site_url`, `url_name`, `email`, `admin`, `address`, `phone`, `image_link`, `reg`, `min_with`, `max_with`)
VALUES (1, 'Ruxfund', 'http://127.0.0.1:8000', 'Ruxfund', 'admin@example.com', 'admin@example.com', '', '', '', '', 10, 1000000)
ON DUPLICATE KEY UPDATE `id` = `id`;

INSERT INTO `fak` (`id`, `users`, `deposit`, `withdraw`, `days`)
VALUES (1, 0, 0, 0, 0)
ON DUPLICATE KEY UPDATE `id` = `id`;

INSERT INTO `plan` (`type`, `name`, `percent`, `ref`, `min`, `max`, `num`, `calc`)
SELECT 1, 'Starter', 1, 5, 10, 1000000, 1, 24
WHERE NOT EXISTS (SELECT 1 FROM `plan` LIMIT 1);

INSERT INTO `sitewallet` (`type`, `address`)
VALUES ('BTC', '');
INSERT INTO `sitewallet` (`type`, `address`)
VALUES ('ETH', '');
INSERT INTO `sitewallet` (`type`, `address`)
VALUES ('USDT', '');

INSERT INTO `flow` (`id`, `username`, `password`, `code`)
VALUES (1, 'admin', '', 'admin_code')
ON DUPLICATE KEY UPDATE `id` = `id`;

SET FOREIGN_KEY_CHECKS = 1;
