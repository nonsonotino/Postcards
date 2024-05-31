<?php

/**
 * Starts a secure session.
 */
function sec_session_start()
{
        $session_name = 'sec_session_id'; // Imposta un nome di sessione
        $secure = false; // Imposta il parametro a true se vuoi usare il protocollo 'https'.
        $httponly = true; // Questo impedirà ad un javascript di essere in grado di accedere all'id di sessione.
        ini_set('session.use_only_cookies', 1); // Forza la sessione ad utilizzare solo i cookie.
        $cookieParams = session_get_cookie_params(); // Legge i parametri correnti relativi ai cookie.
        session_set_cookie_params($cookieParams["lifetime"], $cookieParams["path"], $cookieParams["domain"], $secure, $httponly);
        session_name($session_name); // Imposta il nome di sessione con quello prescelto all'inizio della funzione.
        session_start(); // Avvia la sessione php.
        session_regenerate_id(); // Rigenera la sessione e cancella quella creata in precedenza.
} // TODO: da testare

/**
 * Registers user credentials in the current session.
 * @param $username
 */
function registerLoggedUser($username)
{
        $_SESSION["username"] = $username;
}

/**
 * Checks if the user is logged in.
 * @return bool
 */
function isUserLoggedIn()
{
        return isset($_SESSION["username"]);
}

/**
 * Checks if the current page is active.
 */
function isActive($pagename)
{
        if (basename($_SERVER['PHP_SELF']) == $pagename) {
                echo " class='active' ";
        }
}

/**
 * Retrieves the previous page from session history.
 */
function getPreviousPage()
{
        if (!isset($_SESSION)) {
                session_start();
        }

        if (!isset($_SESSION["history"])) {
                $_SESSION["history"] = array();
        }

        end($_SESSION["history"]);
        return prev($_SESSION["history"]);
}

/**
 * Updates the session history with the current page.
 * @param $pageName The name or identifier of the 
 * current page to be added to the session history
 */
function updateHistory($pageName)
{
        if (!isset($_SESSION)) {
                session_start();
        }

        if (!isset($_SESSION["history"])) {
                $_SESSION["history"] = array();
        }

        if (end($_SESSION["history"]) != $pageName) {
                array_push($_SESSION["history"], $pageName);
        }
}
