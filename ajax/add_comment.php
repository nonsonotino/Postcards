<?php
require_once ("../bootstrap.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['commentContent']) && isset($_GET['postcardId']) && isset($_SESSION['username'])) {
    $commentContent = filter_input(INPUT_POST, "commentContent", FILTER_SANITIZE_SPECIAL_CHARS);
    $idPostCard = $_GET['postcardId'];
    $username = $_SESSION['username'];

    if ($dbh->addComment($idPostCard, $commentContent, $username)) {
        echo "success";
    } else {
        $errorMessage = "Error! Your comment could not be posted.";
        echo json_encode(["error" => $errorMessage]);
    }
}
?>