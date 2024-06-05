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
 * Gives the timestamp in the correct format.
 */
function timeAgo($datetime, $full = false)
{
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);

        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        $string = array(
                'y' => 'year',
                'm' => 'month',
                'w' => 'week',
                'd' => 'day',
                'h' => 'hour',
                'i' => 'minute',
                's' => 'second',
        );
        foreach ($string as $k => &$v) {
                if ($diff->$k) {
                        $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
                } else {
                        unset($string[$k]);
                }
        }

        if (!$full)
                $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'just now';
}