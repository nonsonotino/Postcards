<?php
require_once ("bootstrap.php");

$username = $_SESSION["username"];
$profile = $dbh->getUserProfile($username);
$notifications = $dbh->getNotifications($username);

$template_params["title"] = "Notifications";
$template_params["page"] = "notifications_page.php";
$template_params["profile"] = $profile;
$template_params["notifications"] = $notifications;

require ("template/base.php");
?>