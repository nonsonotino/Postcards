<?php
require_once ("../bootstrap.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION["username"])) {
    $username = $_SESSION["username"];
    $data = json_decode(file_get_contents("php://input"), true);
    $result = $dbh->searchUsers($username, $data);
    echo json_encode($result);
}
?>