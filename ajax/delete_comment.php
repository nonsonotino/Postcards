<?php
require_once ("../bootstrap.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["commentId"]) && isset($_SESSION["username"])) {
    $commentId = $_POST["commentId"];
    $username = $_SESSION["username"];

    if ($dbh->isCommentOwner($commentId, $username)) {
        if ($dbh->deleteComment($commentId)) {
            echo "success";
        } else {
            $errorMessage = "Error! Your comment could not be deleted.";
        }
    } else {
        $errorMessage = "Error! You are not the owner of this comment.";
    }

    if (isset($errorMessage)) {
        echo json_encode(["error" => $errorMessage]);
    }
} else {
    $errorMessage = "An error occured while deleting your comment.";
    echo json_encode(["error" => $errorMessage]);
}
?>