import pathlib
import unittest


class ServerConfigTests(unittest.TestCase):
    def test_server_uses_environment_based_database_config(self):
        server_file = (
            pathlib.Path(__file__).resolve().parents[1]
            / "includes"
            / "server.php"
        )
        content = server_file.read_text(encoding="utf-8")

        self.assertIn("getenv('DB_HOST')", content)
        self.assertIn("getenv('DB_USERNAME')", content)
        self.assertIn("getenv('DB_PASSWORD')", content)
        self.assertIn("getenv('DB_NAME')", content)

    def test_login_fails_closed_when_database_is_unavailable(self):
        functions_file = (
            pathlib.Path(__file__).resolve().parents[1]
            / "includes"
            / "functions.php"
        )
        content = functions_file.read_text(encoding="utf-8")

        self.assertIn("if(!$con)", content)
        self.assertIn("Authentication is temporarily unavailable", content)


if __name__ == "__main__":
    unittest.main()
