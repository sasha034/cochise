<?php
/**
 * Created by PhpStorm.
 * User: Maxime
 * Date: 08/06/2016
 * Time: 14:36
 */
include('../modele/connexionBdd.php');


if(isset($_GET['action'])){
    if($_GET['action'] == 'getMails'){

        $requete = "SELECT EMAIL FROM MEMBRE";

        $resultat = $bdd->query($requete) or die(print_r($bdd->errorInfo()));

        while ($donnees = $resultat->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $donnees['EMAIL'];
        }


    } elseif ($_GET['action'] == 'getGroups'){

        $requete = "SELECT IDGROUPE, NOMGROUPE FROM GROUPE";

        $resultat = $bdd->query($requete) or die(print_r($bdd->errorInfo()));

        while ($donnees = $resultat->fetch(PDO::FETCH_ASSOC)) {
            $data[$donnees['IDGROUPE']] = $donnees['NOMGROUPE'];
        }
    }

    echo json_encode(($data));
}