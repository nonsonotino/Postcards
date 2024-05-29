<?php

require_once ("../bootstrap.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
    $email = $_POST["email"];
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
    $confirmPassword = filter_input(INPUT_POST, "confirm_password", FILTER_SANITIZE_SPECIAL_CHARS);

    if (empty($username) || empty($email) || empty($password) || empty($confirmPassword)) {
        $errorMessage = "Error! Please fill in all the fields.";
    } else if (!preg_match("/^[a-zA-Z0-9._]*$/", $username)) {
        $errorMessage = "Error! Username can only contain letters, numbers, periods, and underscores.";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorMessage = "Error! Insert a valid email address.";
    } else if (strlen($password) < 6) {
        $errorMessage = "Error! Password must be at least 6 characters long.";
    } else if ($password !== $confirmPassword) {
        $errorMessage = "Error! Passwords do not match.";
    } else if ($dbh->checkUsernameExists($username)) {
        $errorMessage = "Error! Username already in use.";
    } else {
        $registration_result = $dbh->addNewUser($username, $email, $password);
        if (!$registration_result) {
            $errorMessage = "Error while creating the account!";
        } else {
            registerLoggedUser($username);
        }
    }

    if (isset($errorMessage)) {
        echo json_encode(["error" => $errorMessage]);
    } else {
        echo "success";
    }
}
?>