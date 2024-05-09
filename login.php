<?php
require_once("bootstrap.php");

$template_params["title"] = "Login";
$template_params["page"] = "template/login_form.php";
$template_params["js"] = "js/login.js";

if (isset($_SESSION["error"])) {
    echo $_SESSION["error"]; 
    unset($_SESSION["error"]); 
}

require("template/base.php");
?>