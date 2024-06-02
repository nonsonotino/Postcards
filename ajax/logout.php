<?php
session_start();

if (session_unset()) {
    if (session_destroy()) {
        // header("Location: login.php");
        // exit();
        echo "success";
    } else {
        $errorMessage = "Error! Unable to destroy the session.";
    }
}

if (isset($errorMessage)) {
    echo json_encode(["error" => $errorMessage]);
}

?>