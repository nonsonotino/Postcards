<?php
require_once ("bootstrap.php");

$username = $_SESSION["username"];
$profile = $dbh->loadProfilePage($username);
$template_params["profile"] = $profile;
$template_params["title"] = "Comments";
$template_params["page"] = "template/comment_page.php";

require ("template/base.php");
?>