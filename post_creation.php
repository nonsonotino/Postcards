<?php
require_once ("bootstrap.php");

$username = $_SESSION["username"];
$profile = $dbh->loadProfilePage($username);
$template_params["profile"] = $profile;
$template_params["title"] = "Post creation";
$template_params["page"] = "template/post_creation.php";

require ("template/base.php");
?>