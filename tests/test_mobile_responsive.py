from pathlib import Path
import unittest

ROOT = Path(__file__).resolve().parents[1]


class MobileResponsiveTests(unittest.TestCase):
    def read(self, relative_path):
        return (ROOT / relative_path).read_text(encoding="utf-8")

    def test_public_styles_no_longer_hide_horizontal_overflow_globally(self):
        css = self.read("general.css")
        self.assertNotIn("overflow-x: hidden", css.split("@media screen and (max-width: 767px)")[0])
        self.assertIn("@media screen and (max-width: 767px)", css)

    def test_smartsupp_is_constrained_in_public_and_account_mobile_styles(self):
        selector = "#smartsupp-widget-container > div:has(> iframe#widgetMessengerFrame)"
        for path in ("general.css", "user/assets/css/rux-mobile.css"):
            with self.subTest(path=path):
                self.assertIn(selector, self.read(path))
                self.assertIn("max-height: calc(100dvh - 110px)", self.read(path))

    def test_user_transactions_have_a_real_horizontal_scroll_region(self):
        page = self.read("user/transaction.php")
        self.assertIn('class="rux-table-scroll"', page)
        self.assertIn('class="rux-mobile-scroll-hint"', page)
        self.assertIn("Swipe horizontally to view all transaction columns.", page)

    def test_public_mobile_menu_has_signup_and_escape_behavior(self):
        header = self.read("includes/header.php")
        self.assertIn('class="menu-item rux-mobile-only"', header)
        self.assertIn('href="auth/signup.php">Create account</a>', header)
        self.assertIn("event.key === 'Escape'", header)

    def test_admin_has_mobile_table_and_modal_rules(self):
        css = self.read("Rux09069779701/assets/css/rux-mobile.css")
        self.assertIn(".table-responsive", css)
        self.assertIn(".dataTables_wrapper", css)
        self.assertIn("@media (max-width: 767px)", css)
        self.assertIn(".modal-content", css)

    def test_public_user_and_admin_load_the_mobile_overrides(self):
        self.assertIn("general.css?ver=20261025-mobile1", self.read("includes/head.php"))
        self.assertIn("assets/css/rux-mobile.css?ver=20261025-mobile1", self.read("user/includes/head.php"))
        self.assertIn("assets/css/rux-mobile.css?ver=20261025-mobile1", self.read("Rux09069779701/includes/head.php"))


if __name__ == "__main__":
    unittest.main()
