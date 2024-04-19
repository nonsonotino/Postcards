<?php
require_once ("../bootstrap.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $login_result = $dbh->checkLogin($username, $password);

    if (is_null($login_result)) {
        echo "error";
        // TODO: Display error message
    } else {
        echo "success";
        registerLoggedUser($username, $password);
    }
}