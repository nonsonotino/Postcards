<?php
session_start();
define("ASSETS_DIR", "./assets/");
require_once("util/utils.php");
require_once("db/database.php");
$dbh = new DatabaseHelper("localhost", "root", "", "blogtw", 3306);
?>