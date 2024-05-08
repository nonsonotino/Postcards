<?php

require_once("bootstrap.php");

$template_params["title"] = "Sign up";
$template_params["page"] = "template/signup_form.php";
$template_params["js"] = "js/signup.js";

if (isset($_SESSION["error"])) {
    echo $_SESSION["error"]; 
    unset($_SESSION["error"]); 
}

require("template/base.php");
?>
