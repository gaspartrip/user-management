<?php namespace Config;

define("ROOT", str_replace("\\", "/", dirname(__DIR__) . "/"));
define("VIEWS_PATH", ROOT . "Views/");
$base = explode($_SERVER["DOCUMENT_ROOT"], ROOT);
define("BASE", $base[1]);
define("STYLE_PATH", BASE . "Style/");

//Database
define("DB_HOST", "localhost");
define("DB_NAME", "users");
define("DB_USER", "root");
define("DB_PASS", "");
?>
