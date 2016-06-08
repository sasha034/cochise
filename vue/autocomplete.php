<?php

if (isset($_GET['query'])) {
    // Mot tap� par l'utilisateur
    $q = htmlentities($_GET['query']);

    include('../modele/connexionBdd.php');
    
//    try {
//        $bdd = new PDO('mysql:host=localhost;dbname=cochise;charset=utf8', 'root', '');
//
//    } catch (Exception $e) {
//        exit('Impossible de se connecter � la base de donn�es.');
//    }

    // Requ�te SQL
    $requete = "SELECT EMAIL FROM membre";

    // Ex�cution de la requ�te SQL
    $resultat = $bdd->query($requete) or die(print_r($bdd->errorInfo()));

    // On parcourt les r�sultats de la requ�te SQL
    while ($donnees = $resultat->fetch(PDO::FETCH_ASSOC)) {
        // On ajoute les donn�es dans un tableau
        $suggestions['suggestions'][] = $donnees['EMAIL'];
    }

    // On renvoie le donn�es au format JSON pour le plugin
    echo json_encode($suggestions);
}

