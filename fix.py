import re, shutil
from pathlib import Path

DB_PASS = "PUT_PASSWORD_HERE"
DB_USER = "u729714352_investgjvdhv98"
DB_NAME = "u729714352_investgjvdhv98"
DB_HOST = "127.0.0.1"

ROOT   = Path.home() / "ruxfund"
SERVER = ROOT / "includes/server.php"
FUNCS  = ROOT / "includes/functions.php"

def bak(p): shutil.copy(p, str(p)+".bak")
def R(p):   return p.read_text(encoding="utf-8", errors="replace")
def W(p,s): p.write_text(s, encoding="utf-8")

bak(FUNCS); f = R(FUNCS)
if "ob_start" not in f[:100]:
    f = f.replace("<?php\n", "<?php\nob_start();\n", 1)
    print("✓ functions.php: ob_start() added")
W(FUNCS, f)

bak(SERVER); s = R(SERVER)
s = s.replace("ob_start(); // buffer output so session headers can be sent safely\n", "")
s = s.replace("define('DB_USER','ruxfund');",      f"define('DB_USER','{DB_USER}');")
s = s.replace("define('DB_PASS' ,'ruxfundpass');", f"define('DB_PASS' ,'{DB_PASS}');")
s = s.replace("define('DB_NAME', 'ruxfund');",     f"define('DB_NAME', '{DB_NAME}');")
s = s.replace("'172.17.0.2'",                      f"'{DB_HOST}'")
s = s.replace(
    "if($mobileview === 1 || 1 == 1){\n    $mobileview = 'initial-scale=1, width=device-width, maximum-scale=1, minimum-scale=1, user-scalable=no';\n    $textsize = '1rem';\n}else{\n    $mobileview = 'width=1366';\n    $textsize = '1rem';\n}",
    "$mobileview = 'initial-scale=1, width=device-width, maximum-scale=1, minimum-scale=1, user-scalable=no';\n$textsize = '1rem';"
)
print("✓ server.php: DB creds + $mobileview fixed")
W(SERVER, s)
print("Done. Backups: *.bak")
