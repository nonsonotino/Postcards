<?php
require_once("util/functions.php");
sec_session_start();
define("HOST", "localhost");
define("USER", "sec_user");
define("PASSWORD", "62L5LaaWysx4");
define("DATABASE", "postcards");
define("ASSETS_DIR", "./assets/");
require_once("db/database.php");
$dbh = new DatabaseHelper(HOST, USER, PASSWORD, DATABASE, 3306);
?> 