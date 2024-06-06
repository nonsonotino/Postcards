<?php
require_once ("bootstrap.php");

if (isset($_GET["username"])) {
    $username = $_GET["username"];
    $profile = $dbh->getUserProfile($username);
} else {
    $profile = $loggedUser;
}

$postcard = $dbh->getPostcardById($_GET["postcardId"]);

$template_params["title"] = "Home";
$template_params["page"] = "template/single_postcard.php";
$template_params["postcards"] = $postcard;
$template_params["profile"] = $profile;

require ("template/base.php");
?>