<?php
require_once ("../bootstrap.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["postcardId"])) {
    $postcardId = $_POST["postcardId"];

    if ($dbh->deleteAllComments($postcardId) && $dbh->deleteNotification($postcardId)) {
        if ($dbh->deletePostcard($postcardId)) {
            echo "success";
        } else {
            $errorMessage = "Error! Failed to delete postcard.";
        }
    } else {
        $errorMessage = "Error! Failed to delete comments and notifications related to postcard.";
    }
} else {
    $errorMessage = "Error! Invalid request.";
}

if (isset($errorMessage)) {
    echo json_encode(["error" => $errorMessage]);
}
?>