<?php

require_once ("bootstrap.php");

$username = $_SESSION['username'];
$profile = $dbh->loadProfilePage($username);
$friends = $dbh->getPenFriends($username);
$profile["friends"] = count($friends);

$template_params["title"] = "Profile";
$template_params["page"] = "template/profile.php";
$template_params["profile"] = $profile;

require ("template/base.php");
?>