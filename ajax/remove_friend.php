<?php
require_once ("../bootstrap.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["profileUser"]) && isset($_POST["currentUser"])) {
    $usernameSender = $_POST["currentUser"];
    $usernameReceiver = $_POST["profileUser"];

    if ($dbh->removeFriendship($usernameReceiver, $usernameSender)) {
        echo "success";
    } else {
        echo json_encode(["error" => "Failed to remove friend"]);
    }
} else {
    echo json_encode(["error" => "Invalid request"]);
}
?>