<?php
require_once ("../bootstrap.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $password = $_POST["password"];

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

    // if (isset($errorMessage)) {
    //     echo json_encode(["error" => $errorMessage]);
    // } else {
    //     echo "success";
    // }
}