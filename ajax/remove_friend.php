<?php
require_once ("../bootstrap.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION["username"])) {
    $username = $_SESSION["username"];

    if ($dbh->removeFriendship($username, "vez")) {
        echo "success";
    } else {
        echo json_encode(["error" => "Failed to remove friend"]);
    }
}
?>