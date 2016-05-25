<?php
//Fichier de connexion à la base de données MySql
try {
    $bdd = new PDO('mysql:host=localhost;dbname=cochise;charset=utf8', 'root', '');
    } 
catch (Exception $ex) {
    die('Erreur : ' . $e->getMessage());
}

$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);