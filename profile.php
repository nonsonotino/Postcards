<?php

require_once ("bootstrap.php");

if (isset($_GET["username"])) {
    $username = $_GET["username"];
    $profile = $dbh->getUserProfile($username);
    $friends = $dbh->getPenFriends($username);
    $friendsFollowed = $dbh->getPenfriendsFollowed($username);
    $profile["friends"] = count($friends);
    $profile["friendsFollowed"] = count($friendsFollowed);
} else {
    $profile = $loggedUser;
    $friends = $dbh->getPenFriends($profile["username"]);
    $friendsFollowed = $dbh->getPenfriendsFollowed($profile["username"]);
    $profile["friends"] = count($friends);
    $profile["friendsFollowed"] = count($friendsFollowed);
}

$postcards = $dbh->loadUserPostcards($profile["username"]);

$template_params["title"] = "Profile";
$template_params["page"] = "template/profile.php";
$template_params["profile"] = $profile;

require ("template/base.php");
?>