<?php
require_once ("../bootstrap.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);

    if (empty($username) || empty($password)) {
        echo "Please, fill in all the fields";
    } else {
        $login_result = $dbh->login($username, $password);
        if (is_null($login_result)) {
            echo "error";
        } else {
            echo "success";
            registerLoggedUser($username);
        }
    }
}