<?php

include_once '../modele/connexionBdd.php';

$idMembre = filter_input(INPUT_GET, 'idMembre');

$login = filter_input(INPUT_GET, 'login');



if (filter_input(INPUT_GET, 'idGroupe')!= null) {
    $idGroupe = filter_input(INPUT_GET, 'idGroupe');
    $req1 = $bdd->prepare('DELETE FROM APPARTENIR WHERE IDMEMBRE = :IDMEMBRE AND IDGROUPE = :IDGROUPE');
    $req1->execute(array(
        'IDMEMBRE' => $idMembre,
        'IDGROUPE' => $idGroupe
    ));
    $req1->closeCursor();
         
} else { 
    $req1 = $bdd->prepare('DELETE FROM APPARTENIR WHERE IDMEMBRE = :IDMEMBRE');
    $req1->execute(array(
        'IDMEMBRE' => $idMembre
    ));
    $req1->closeCursor();
    
    $req2 = $bdd->prepare('DELETE FROM MEMBRE WHERE IDMEMBRE = :IDMEMBRE');
    $req2->execute(array(
        'IDMEMBRE' => $idMembre
    ));
    $req2->closeCursor();   
}



 header('Location: ../vue/gestion_groupe.php?login='.$login);
 exit;


