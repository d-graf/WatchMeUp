<?php

/**
 * Created by PhpStorm.
 * User: bhawks
 * Date: 07.03.2017
 * Time: 15:29
 */
class Security
{

    public static function isLoggedIn() {
        return (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true);
    }

    public static function getUsername() {
        return (isset($_SESSION['user'])) ? $_SESSION['user'] : "NOT LOGGED IN";
    }

}