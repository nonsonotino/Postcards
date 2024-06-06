<?php
require_once ("../bootstrap.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["commentContent"]) && isset($_POST["postcardId"]) && isset($_SESSION["username"])) {
    $commentContent = filter_input(INPUT_POST, "commentContent", FILTER_SANITIZE_SPECIAL_CHARS);
    $idPostCard = $_POST["postcardId"];
    $username = $_SESSION["username"];
    $postcard = $dbh->getPostcardById($idPostCard);

    if ($dbh->addComment($idPostCard, $commentContent, $username)) {
        $dbh->addNotification($idPostCard, false, $postcard["username"], $username, 2);
        echo "success";
    } else {
        $errorMessage = "Error! Your comment could not be posted.";
        echo json_encode(["error" => $errorMessage]);
    }
} else {
    $errorMessage = "An error occured while posting your comment.";
    echo json_encode(["error" => $errorMessage]);
}
?>