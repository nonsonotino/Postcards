<?php
session_start();
define("ASSETS_DIR", "./assets/");
require_once("db/database.php");
require_once("util/functions.php");
$dbh = new DatabaseHelper("localhost", "root", "", "postcards", 3306);
?> 