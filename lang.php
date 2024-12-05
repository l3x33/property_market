<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once  get_language_file();

function get_language_file()
{
    $_SESSION['lang'] = $_SESSION['lang'] ?? 'en';

    if (isset($_GET['lang']) && !empty($_GET['lang'])) {
        $allowed_langs = ['en', 'fr']; 
        if (in_array(needle: $_GET['lang'], haystack: $allowed_langs)) {
            $_SESSION['lang'] = $_GET['lang'];
        }
    }
    return __DIR__ . "/languages/" . $_SESSION['lang'] . ".php";
}



function __($str)
{
    global $lang;
    return $lang[$str] ?? $str;
}
