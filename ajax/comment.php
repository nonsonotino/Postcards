<?php
require_once ("../bootstrap.php");

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["comment"]) && isset($_POST["postId"])) {
    $dbh->insertComment(20, "WoW!", $_SESSION["username"]);
    $response["user"] = $dbh->getUserByUsername($_SESSION["username"]);
    echo json_encode($response);
}

?>