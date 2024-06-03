<?php
require_once ("bootstrap.php");

$username = $_SESSION["username"];
$profile = $dbh->loadProfilePage($username);
$template_params["profile"] = $profile;
$template_params["title"] = "Notifications";
$template_params["page"] = "notifications_page.php";

require ("template/base.php");
?>