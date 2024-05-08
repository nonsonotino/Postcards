<?php

require_once("../bootstrap.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirm_password"]; 

    if (empty($username) || empty($email) || empty($password) || empty($confirmPassword)) {
        $errorMessage = "Error! You can't use empty information!";
    }
    else if(!preg_match("/^[a-zA-Z0-9._]*$/",$username)) {
        $errorMessage = "Error! Username can only contain letters, numbers, periods, and underscores!";
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorMessage = "Error! Invalid email format!";
    }
    else if (strlen($password) < 6) {
        $errorMessage = "Error! Password must be 6 characters at least!";
    }
    else if ($password !== $confirmPassword) { 
        $errorMessage = "Error! Passwords do not match!";
    }
    else if($dbh->checkUsernameExists($username)) {
        $errorMessage = "Error! Username already in use!";
    }
    else {
        $registration_result = $dbh->addNewUser($username, $email, $password);
        if(!$registration_result){
            $errorMessage = "Error while creating the account!";
        }
        else{
            registerLoggedUser($username, $password);
        }
    }

    if (isset($errorMessage)) {
        echo json_encode(["error" => $errorMessage]);
        header("Location: /Postcards/signup.php");
        exit();
    } else {
        echo "success";
        header("Location: /Postcards/index.php");
        exit();
    }
}
?>
