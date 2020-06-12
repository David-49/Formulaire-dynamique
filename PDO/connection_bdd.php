<?php

include('identifiant.php');

try {
    $connection = new PDO('mysql:host=localhost;dbname=ajax;charset=utf8', $identifiant, $mdp, array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO:: FETCH_OBJ,
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'",
    ));
} catch (PDOException $e) {
    die('Erreur : '.$e->getMessage());
}
