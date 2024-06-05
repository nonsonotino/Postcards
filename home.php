<?php
require_once ("bootstrap.php");

$postcards = $dbh->loadHomePage($loggedUser["username"]);

$template_params["title"] = "Home";
$template_params["page"] = "template/home.php";
$template_params["postcards"] = $postcards;

require ("template/base.php");
?>