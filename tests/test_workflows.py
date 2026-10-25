import pathlib
import unittest


ROOT = pathlib.Path(__file__).resolve().parents[1]


class WorkflowRegressionTests(unittest.TestCase):
    def read(self, relative):
        return (ROOT / relative).read_text(encoding="utf-8")

    def test_public_and_user_plan_navigation_exists(self):
        public_plans = self.read("plans.php")
        user_plans = self.read("user/plan.php")
        user_dashboard = self.read("user/index.php")
        admin_plans = self.read("Rux09069779701/setting.php")
        public_header = self.read("includes/header.php")
        user_header = self.read("user/includes/header.php")
        self.assertIn("loop_table_DESC($con, 'plan', 200)", public_plans)
        self.assertIn("loop_table_DESC($con, 'plan', 200)", user_plans)
        self.assertIn("loop_table_DESC($con, 'plan', 200)", user_dashboard)
        self.assertIn("loop_table($con, 'plan')", admin_plans)
        self.assertIn('href="plans.php"', public_header)
        self.assertIn('href="plan.php"', user_header)

    def test_deposit_page_renders_form_and_payment_instructions(self):
        content = self.read("user/deposit.php")
        self.assertIn('name="invest"', content)
        self.assertIn('name="coin"', content)
        self.assertIn('name="by"', content)
        self.assertIn("payment_amount", content)
        self.assertIn("sitewallet", content)

    def test_withdrawal_requires_approved_kyc(self):
        content = self.read("includes/functions.php")
        self.assertIn("Withdrawals require approved KYC verification", content)
        self.assertIn("filter_input(INPUT_POST, 'amount', FILTER_VALIDATE_FLOAT)", content)

    def test_admin_can_manage_existing_sitewallet_methods(self):
        content = self.read("Rux09069779701/payment-methods.php")
        sidebar = self.read("Rux09069779701/includes/side-bar.php")
        self.assertIn("include 'includes/derfdssf.php';", content)
        self.assertIn("sitewallet", content)
        self.assertIn("payment-methods.php", sidebar)

    def test_smartsupp_loads_on_public_and_user_pages_without_duplicate_chat(self):
        public_footer = self.read("includes/footer.php")
        user_footer = self.read("user/includes/footer.php")
        chat_loader = self.read("includes/smartsupp.php")
        self.assertIn("smartsupp.php", public_footer)
        self.assertIn("smartsupp.php", user_footer)
        self.assertIn("6657053d10f0cf7b694bdaba025c6ca860f35579", chat_loader)
        self.assertIn("getenv('SMARTSUPP_KEY')", chat_loader)
        self.assertIn("www.smartsuppchat.com/loader.js", chat_loader)
        self.assertNotIn("code.tidio.co", user_footer)


if __name__ == "__main__":
    unittest.main()
