<?php
require_once "bootstrap.php";

//Set template parameters
$template_params["title"] = "Login";
$template_params["base"] = "form_base.php";
$template_params["type"] = "login_form.php";

require("template/form_base.php");
?>