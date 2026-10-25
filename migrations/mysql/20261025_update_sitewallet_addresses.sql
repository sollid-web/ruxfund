-- Configures the wallet addresses shown in the user payment instructions.
START TRANSACTION;

INSERT INTO `sitewallet` (`type`, `address`) VALUES
  ('BTC', 'bc1qqqd02yd8e3zfq8muglr2n50dk99d064p29yctp'),
  ('ETH', '0xF753c3fE484c7aC9E32d2a16873bcc0Be79E4902'),
  ('USDT', 'TG7sFWrG8PnNgGrXmWdK8BFZ178Ljb3knG')
ON DUPLICATE KEY UPDATE `address` = VALUES(`address`);

COMMIT;
