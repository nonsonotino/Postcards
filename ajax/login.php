<?php
require_once ("../bootstrap.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);

    if (empty($username) || empty($password)) {
        $errorMessage = "Please, fill in all the fields";
    } else {
        $login_result = $dbh->login($username, $password);
        if (is_null($login_result)) {
            echo "error";
            //$errorMessage = "Error! Incorrect email or password!"; //Login fallito
        } else {
            echo "success";
            registerLoggedUser($login_result["username"], $login_result["password"]);
        }
    }
}