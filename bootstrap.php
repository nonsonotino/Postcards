<?php
define("ASSETS_DIR", "./assets/");
require_once ("db/database.php");
require_once ("util/functions.php");
$dbh = new DatabaseHelper("localhost", "root", "", "postcards", 3306);

if (!isset($_SESSION)) {
    session_start();
}

if (!isUserLoggedIn() && basename($_SERVER['PHP_SELF']) !== 'login.php') {
    header("Location: login.php");
    exit();
}
?>