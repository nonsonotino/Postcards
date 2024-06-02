<?php
require_once ("bootstrap.php");

$template_params["title"] = "Postcards";

if (!isset($_SESSION["username"])) {
    $template_params["page"] = "login.php";
    header("Location: login.php");
    exit();
} else {
    $template_params["page"] = "home.php";
    header("Location: home.php");
}

require ("template/base.php");
?>