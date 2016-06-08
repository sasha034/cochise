<?php
include_once '../modele/connexionBdd.php';

$email_membre = filter_input(INPUT_POST, 'email_membre');
$nom_membre = filter_input(INPUT_POST, 'nom_membre');
$prenom_membre = filter_input(INPUT_POST, 'prenom_membre');

$req = $bdd->prepare('INSERT INTO MEMBRE(EMAIL, NOM, PRENOM) VALUES(:EMAIL, :NOM, :PRENOM)');
    $req->execute(array(
        'EMAIL' => $email_membre,
        'NOM' => $nom_membre,        
        'PRENOM' => $prenom_membre
    
            
    ));
$req->closeCursor();
header('Location: ../vue/gestion_groupe.php');


