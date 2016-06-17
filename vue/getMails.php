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
    } elseif ($_GET['action'] == 'getHistoryById'){
        $requete = "SELECT * FROM HISTORIQUE WHERE id = ".$_GET['id'];

        $resultat = $bdd->query($requete) or die(print_r($bdd->errorInfo()));

        while ($donnees = $resultat->fetch(PDO::FETCH_ASSOC)) {
            ($donnees['pj'] == 0) ? $hasPj = 'Aucune' : $hasPj = 'Oui';
            ($donnees['sent'] == 0) ? $sent = 'Non' : $hasPj = 'Oui';
            $data = array(
                'id' => $donnees['id'],
                'creationDate' => $donnees['creationDate'],
                'msgFrom' => $donnees['msgFrom'],
                'msgTo' => $donnees['msgTo'],
                'object' => $donnees['object'],
                'pj' => $hasPj,
                'message' => $donnees['message'],
                'sent' => $sent,
            );
        }
    }

    echo json_encode(($data));
}