import pathlib
import unittest


class BankingPageTests(unittest.TestCase):
    def test_deposit_page_handles_missing_database_connection(self):
        deposit_file = pathlib.Path(__file__).resolve().parents[1] / "user" / "deposit.php"
        content = deposit_file.read_text(encoding="utf-8")

        self.assertIn("$plan_id = filter_input(INPUT_GET, 'plan', FILTER_VALIDATE_INT);", content)
        self.assertIn("if ($con) {", content)
        self.assertIn("deposit($con, (int) $getuser['id']);", content)

    def test_withdraw_page_handles_missing_database_connection(self):
        withdraw_file = pathlib.Path(__file__).resolve().parents[1] / "user" / "withdraw.php"
        content = withdraw_file.read_text(encoding="utf-8")

        self.assertIn("add_wallet($con);", content)
        self.assertIn("if ($con) {", content)
        self.assertIn("withdraw_m($con, $getsite);", content)


if __name__ == "__main__":
    unittest.main()
