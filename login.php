<?php
require_once("bootstrap.php");
//sec_session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica le credenziali dell'utente (sostituisci con la tua logica di autenticazione)
    $username = $_POST["username"];
    $password = $_POST["password"];

    $login_result = $dbh->checkLogin($username, $password);
    if (count($login_result) == 0) {
        //Login fallito
        echo "login failed";
    } else {
        registerLoggedUser($username, $password);
        // Reindirizza a home.php
        $template_params["title"] = "Home";
        $template_params["page"] = "template/home.php";
        require_once("template/base.php");
        exit; // Assicura che il codice successivo non venga eseguito
    }
}
//     // Simulazione di credenziali corrette (sostituisci con la tua logica)
//     if ($username === "nitritodisodio" && $password === "pass250124") {
//         // Registra l'utente nella sessione
//         $_SESSION["username"] = $username;

//         // Reindirizza a home.php
//         $template_params["title"] = "Home";
//         $template_params["page"] = "template/home.php";
//         //header("Location: base.php");
//         require_once("template/base.php");
//         exit; // Assicura che il codice successivo non venga eseguito
//     }
// }

// if (isset($_POST["username"]) && isset($_POST["password"])) {
//     $login_result = $dbh->checkLogin($_POST["username"], $_POST["password"]);
//     if (count($login_result) == 0) {
//         //Login fallito
//         echo "login failed";
//     } else {
//         registerLoggedUser($_POST["username"], $_POST["password"]);
//     }
//     header("Location: template/home.php");
// }

// // // if (isUserLoggedIn()) {
// // //     // $templateParams["title"] = "Home";
// // //     // $templateParams["nome"] = "home.php";
// // //     header("Location: template/home.php");
// // // } else {
// // //     $templateParams["title"] = "Login";
// // //     $templateParams["nome"] = "login_form.php";
// // // }