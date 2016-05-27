<?php
//Fichier de connexion � la base de donn�es MySql
$local = false;

if($local){
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=cochise;charset=utf8', 'root', '');
    }
    catch (Exception $ex) {
        die('Erreur : ' . $ex->getMessage());
    }
} else {
    try {
        $servername = "mysql-daskopls.alwaysdata.net";
        $username = "daskopls";
        $password = "max18ime";
        $port = "";
        $db = "daskopls_cochise";

        $bdd =  new PDO("mysql:host=$servername$port;dbname=$db;charset=utf8", $username, $password);
    } catch (Exception $ex) {
        die('Erreur : ' . $ex->getMessage());
    }
}


$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);