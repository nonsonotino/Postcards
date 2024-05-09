<?php
require_once ("../bootstrap.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $login_result = $dbh->checkLogin($username, $password);

    if ($login_result) {
        echo "success";
        registerLoggedUser($username, $password);
    } else {
        echo "error";
        $_SESSION["error"] = "Invalid username or password";
        header("Location: /Postcards/login.php");
        exit();
    }
}