<?php

require_once ("bootstrap.php");

$username = $_SESSION['username'];
$profile = $dbh->loadProfilePage($username);
$template_params["profile"] = $profile;
$template_params["title"] = "Edit profile";
$template_params["page"] = "template/profile_creation.php";

require ("template/base.php");
?>