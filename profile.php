<?php

require_once ("bootstrap.php");

if (isset($_GET["username"])) {
    $username = $_GET["username"];
    $profile = $dbh->getUserProfile($username);
    $friends = $dbh->getPenFriends($username);
    $friendsFollowed = $dbh->getPenfriendsFollowed($username);
    $profile["friends"] = count($friends);
    $profile["friendsFollowed"] = count($friendsFollowed);
    $profileUsername = $_GET["username"];
    $currentUsername = $_SESSION["username"];
    $isFriend = $dbh->checkFriendship($profileUsername, $currentUsername);
} else {
    $profile = $loggedUser;
    $friends = $dbh->getPenFriends($profile["username"]);
    $friendsFollowed = $dbh->getPenfriendsFollowed($profile["username"]);
    $profile["friends"] = count($friends);
    $profile["friendsFollowed"] = count($friendsFollowed);
    $isFriend = false;
}

$postcards = $dbh->loadUserPostcards($profile["username"]);

$template_params["title"] = "Profile";
$template_params["page"] = "template/profile.php";
$template_params["profile"] = $profile;
$template_params["isFriend"] = $isFriend;

require ("template/base.php");
?>