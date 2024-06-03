<?php
require_once ("bootstrap.php");

$username = $_SESSION["username"];
$postcards = $dbh->loadHomePage($username);
$profile = $dbh->loadProfilePage($username);

$template_params["title"] = "Home";
$template_params["page"] = "template/home.php";
$template_params["postcards"] = $postcards;
$template_params["profile"] = $profile;

require ("template/base.php");
?>