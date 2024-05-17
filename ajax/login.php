<?php
require_once ("../bootstrap.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $password = $_POST["password"];

    if (empty($username) || empty($password)) {
        $errorMessage = "Please, fill in all the fields";
    } else {
        $login_result = $dbh->checkLogin($username, $password);

        if ($login_result) {
            echo "success";
            registerLoggedUser($username, $password);
        } else {
            echo "error";
        }
    }


}