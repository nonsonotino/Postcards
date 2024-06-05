<?php

require_once ("bootstrap.php");

if (isset($_GET["username"])) {
    $username = $_GET["username"];
    $profile = $dbh->getUserProfile($username);
    $friends = $dbh->getPenFriends($username);
    $profile["friends"] = count($friends);
} else {
    $profile = $loggedUser;
    $friends = $dbh->getPenFriends($profile["username"]);
    $profile["friends"] = count($friends);
}

$postcards = $dbh->loadUserPostcards($profile["username"]);

$template_params["title"] = "Profile";
$template_params["page"] = "template/profile.php";
$template_params["profile"] = $profile;

require ("template/base.php");
?>