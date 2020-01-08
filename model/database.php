<?php

function db_connexion()
{
    // ini_set('display_errors', 1);
    // ini_set('display_startup_errors', 1);
    // error_reporting(E_ALL);
    // error_reporting(E_ALL ^ E_NOTICE);
    // session_start();
    try
    {
		$bdd = new PDO('mysql:host=localhost;dbname=camagru;charset=utf8', 'root', 'Qwerty93400');
    return ($bdd);
    
    } catch (Exception $e) {
		die('Erreur : ' . $e->getMessage());
		return NULL;
    }
}
