<?php
require_once ("bootstrap.php");

if (isset($_GET["postcardId"])) {
    $comments = $dbh->getComments($_GET["postcardId"]);
    $template_params["comments"] = $comments;
} else {
    $template_params["comments"] = null;

}

$template_params["title"] = "Comments";
$template_params["page"] = "template/comment_page.php";

require ("template/base.php");
?>