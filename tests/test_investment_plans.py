import pathlib
import re
import unittest

ROOT = pathlib.Path(__file__).resolve().parents[1]
EXPECTED = {
    "Growth": (2.0000, 5.0000, 100.00, 4999.00, 14, 24),
    "Pro": (2.5000, 5.0000, 5000.00, 24999.00, 30, 24),
    "Elite": (3.0000, 5.0000, 25000.00, 100000.00, 60, 24),
}


class InvestmentPlanConfigurationTests(unittest.TestCase):
    def assert_plan_rows(self, content, mysql=False):
        for name, (percent, ref, minimum, maximum, duration, interval) in EXPECTED.items():
            if mysql:
                pattern = (
                    rf"SELECT 1, '{name}', {percent:.4f}, {ref:.4f}, "
                    rf"{minimum:.2f}, {maximum:.2f}, {duration}, {interval}"
                )
            else:
                pattern = (
                    rf"SELECT 1, '{name}', {percent:.4f}, {ref:.4f}, "
                    rf"{minimum:.2f}, {maximum:.2f}, {duration}, {interval}"
                )
            self.assertRegex(content, pattern)

    def test_postgres_and_mysql_schemas_seed_daily_plans(self):
        postgres = (ROOT / "supabase_schema.sql").read_text(encoding="utf-8")
        mysql = (ROOT / "schema.sql").read_text(encoding="utf-8")
        self.assert_plan_rows(postgres)
        self.assert_plan_rows(mysql, mysql=True)
        self.assertIn("SELECT 1, 'Starter', 1, 5, 10, 1000000, 1, 24", postgres)
        self.assertIn("SELECT 1, 'Starter', 1, 5, 10, 1000000, 1, 24", mysql)

    def test_existing_database_migrations_are_idempotent_by_plan_name(self):
        postgres = (ROOT / "migrations/postgresql/20261025_add_growth_pro_elite_plans.sql").read_text(encoding="utf-8")
        mysql = (ROOT / "migrations/mysql/20261025_add_growth_pro_elite_plans.sql").read_text(encoding="utf-8")
        self.assert_plan_rows(postgres)
        self.assert_plan_rows(mysql, mysql=True)
        self.assertEqual(postgres.count("WHERE NOT EXISTS"), 3)
        self.assertEqual(mysql.count("WHERE NOT EXISTS"), 3)

    def test_roi_engine_still_uses_plan_percentage_per_configured_interval(self):
        functions = (ROOT / "includes/functions.php").read_text(encoding="utf-8")
        roi = functions[functions.index("function getprofit_per_investment"):functions.index("function all_bonus")]
        self.assertIn("$days = 60 * 60 * $num * $calc", roi)
        self.assertIn("$percent = (get_data($con, 'plan', 'id', $gettrns['plan'])['percent'])/100", roi)
        self.assertIn("$profit = ($percent * $capital) * $howmanyrounds", roi)
        self.assertTrue(all(interval == 24 for *_, interval in EXPECTED.values()))


if __name__ == "__main__":
    unittest.main()
