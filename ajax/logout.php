<?php
session_start();

session_unset();
if (session_destroy()) {
    echo "success";
} else {
    $errorMessage = "Error! Unable to destroy the session.";
    echo json_encode(["error" => $errorMessage]);
}
?>