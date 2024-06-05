<?php
require_once ("bootstrap.php");

if (isset($_GET["username"])) {
    $username = $_GET["username"];
    $profile = $dbh->getUserProfile($username);
} else {
    $profile = $loggedUser;
}

// TODO capire come passare l'id del postcard
$postcard = $dbh->getPostcardById(20);

$template_params["title"] = "Home";
$template_params["page"] = "template/single_postcard.php";
$template_params["postcards"] = $postcard;
$template_params["profile"] = $profile;

require ("template/base.php");
?>