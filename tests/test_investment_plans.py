import pathlib
import unittest

ROOT = pathlib.Path(__file__).resolve().parents[1]
EXPECTED = {
    "Growth": (2.0000, 5.0000, 100.00, 4999.00, 14, 24),
    "Pro": (2.5000, 5.0000, 5000.00, 24999.00, 30, 24),
    "Elite": (3.0000, 5.0000, 25000.00, 100000.00, 60, 24),
}


class InvestmentPlanConfigurationTests(unittest.TestCase):
    def read(self, path):
        return (ROOT / path).read_text(encoding="utf-8")

    def assert_plan_rows(self, content):
        for name, (percent, ref, minimum, maximum, duration, interval) in EXPECTED.items():
            pattern = (
                rf"SELECT 1, '{name}', {percent:.4f}, {ref:.4f}, "
                rf"{minimum:.2f}, {maximum:.2f}, {duration}, {interval}"
            )
            self.assertRegex(content, pattern)

    def test_postgres_and_mysql_schemas_seed_all_new_plans_and_keep_starter(self):
        postgres = self.read("supabase_schema.sql")
        mysql = self.read("schema.sql")
        self.assert_plan_rows(postgres)
        self.assert_plan_rows(mysql)
        self.assertIn("SELECT 1, 'Starter', 1, 5, 10, 1000000, 1, 24", postgres)
        self.assertIn("SELECT 1, 'Starter', 1, 5, 10, 1000000, 1, 24", mysql)

    def test_existing_database_plan_migrations_are_idempotent(self):
        postgres = self.read("migrations/postgresql/20261025_add_growth_pro_elite_plans.sql")
        mysql = self.read("migrations/mysql/20261025_add_growth_pro_elite_plans.sql")
        self.assert_plan_rows(postgres)
        self.assert_plan_rows(mysql)
        self.assertEqual(postgres.count("WHERE NOT EXISTS"), 3)
        self.assertEqual(mysql.count("WHERE NOT EXISTS"), 3)

    def test_plan_catalogs_render_database_plans_for_public_users_and_admin(self):
        home = self.read("index.php")
        public = self.read("plans.php")
        user_catalog = self.read("user/plan.php")
        dashboard = self.read("user/index.php")
        admin = self.read("Rux09069779701/setting.php")
        admin_editor = self.read("Rux09069779701/includes/ajax.php")
        for content in [home, public, user_catalog, dashboard, admin]:
            self.assertIn("loop_table", content)
        self.assertIn("TOTAL TERM RETURN", home)
        self.assertIn("plan_daily_accrual_percent($plans)", home)
        self.assertIn("Total return for full term", public)
        self.assertIn("Average daily accrual (simple)", public)
        self.assertIn("plan_daily_accrual_percent($plans)", user_catalog)
        self.assertIn("Investment plan total returns", dashboard)
        self.assertIn("Total return / duration", admin)
        self.assertIn("Total return for full term (%)", admin_editor)

    def test_roi_is_linear_and_capped_at_term_maturity(self):
        functions = self.read("includes/functions.php")
        roi = functions[functions.index("function investment_profit_amount"):functions.index("function all_bonus")]
        self.assertIn("$maturity = $start + $duration_seconds", roi)
        self.assertIn("min((int)$now, $maturity)", roi)
        self.assertIn("$elapsed / $duration_seconds", roi)
        self.assertIn("$term_return = (float)$plan['percent'] / 100", roi)

    def test_matured_deposits_are_closed_at_maturity_and_sweep_is_scheduled(self):
        functions = self.read("includes/functions.php")
        user_guard = self.read("user/includes/checkuser.php")
        admin_deposits = self.read("Rux09069779701/deposit.php")
        cron = self.read("migrations/postgresql/20261025_schedule_maturity_sweep.sql")
        self.assertIn("function settle_due_investments", functions)
        self.assertIn("closetime=t.updated + (p.num::bigint * p.calc::bigint * 3600)", functions)
        self.assertIn("settle_due_investments($con, (int)$getuser['id'])", user_guard)
        self.assertIn("settle_due_investments($con)", admin_deposits)
        self.assertIn("'* * * * *'", cron)
        self.assertIn("t.closed = 0", cron)
        self.assertIn("EXTRACT(EPOCH FROM clock_timestamp())", cron)

    def test_user_close_requires_ownership_and_roi_cannot_run_past_term(self):
        user_transaction = self.read("user/transaction.php")
        functions = self.read("includes/functions.php")
        self.assertIn("(int)$closing_investment['sender'] === (int)$getuser['id']", user_transaction)
        self.assertIn("closetime=LEAST(?, t.updated + (p.num::bigint * p.calc::bigint * 3600))", functions)


if __name__ == "__main__":
    unittest.main()
