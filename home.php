<?php
require_once ("bootstrap.php");

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];
$postcards = $dbh->loadHomePage($username);

$template_params["title"] = "Home";
$template_params["page"] = "template/home.php";
$template_params["postcards"] = $postcards;

require ("template/base.php");
?>