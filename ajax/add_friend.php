<?php
require_once ("../bootstrap.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["profileUser"]) && isset($_POST["currentUser"])) {
    $usernameSender = $_POST["currentUser"];
    $usernameReceiver = $_POST["profileUser"];

    if ($dbh->checkFriendship($usernameReceiver, $usernameSender)) {
        $errorMessage = "You are already friends";
    } else {
        $result = $dbh->addFriendship($usernameReceiver, $usernameSender);

        if (is_null($result)) {
            $errorMessage = "Failed to add friend";
        } else {
            $dbh->addNotification(null, false, $usernameReceiver, $usernameSender, 3);
        }
    }

    if (isset($errorMessage)) {
        echo json_encode(["error" => $errorMessage]);
    } else {
        echo "success";
    }
}
?>