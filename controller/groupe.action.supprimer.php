<?php
session_start();
include_once '../modele/connexionBdd.php';
$login = filter_input(INPUT_GET, 'login');
echo $login;

$idGroupe = filter_input(INPUT_GET, 'idGroupe');

$req1 = $bdd->prepare('DELETE FROM appartenir WHERE IDGROUPE = :IDGROUPE');
$req1->execute(array(
    'IDGROUPE' => $idGroupe
    ));
$req1->closeCursor();

$req2 = $bdd->prepare('DELETE FROM groupe where IDGROUPE = :IDGROUPE');
$req2->execute(array(
    'IDGROUPE' => $idGroupe
    ));
$req2->closeCursor();
header('Location: ../vue/gestion_groupe.php?login='.$login);
exit;