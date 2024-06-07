<?php

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