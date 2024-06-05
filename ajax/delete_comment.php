<?php
require_once ("../bootstrap.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($comments['idComment']) && isset($_SESSION['username'])) {
    $commentId = $comments['idComment'];
    $username = $_SESSION['username'];

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
}
?>