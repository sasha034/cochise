<?php
session_start();

include_once '../modele/connexionBdd.php';

$nom_groupe = filter_input(INPUT_POST, 'nom_groupe');
$userLogin = $_SESSION['login'];
echo $userLogin;
$req = $bdd->prepare('INSERT INTO groupe(NOMGROUPE) VALUES(:NOM)');
    $req->execute(array(
        'NOM' => $nom_groupe   
        ));
$req->closeCursor();

header('Location: ../vue/gestion_groupe.php?login='.$userLogin);





