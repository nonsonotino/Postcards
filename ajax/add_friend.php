<?php
require_once ("../bootstrap.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION["username"])) {
    $username = $_SESSION["username"];
    $result = $dbh->addFriendship($username, "vez");

    if (!is_null($result)) {
        echo "success";
    } else {
        echo json_encode(["error" => "Failed to remove friend"]);
    }
}
?>