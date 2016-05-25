<?php
header('Content-Type: text/html;charset=utf-8'); 
include_once '../modele/connexionBdd.php';
$idMembresChecked = filter_input(INPUT_POST, "checked_members", FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
$idGroupeSelected = filter_input(INPUT_POST, "idGroupeSelected");


for ($i = 0; $i < sizeof($idMembresChecked); $i++) {
    $req2 = $bdd->prepare('INSERT INTO appartenir(IDMEMBRE, IDGROUPE) VALUES(:IDMEMBRE, :IDGROUPE)');
    $req2->execute(array(
        'IDMEMBRE' => $idMembresChecked[$i],
        'IDGROUPE' => $idGroupeSelected
    ));
    $req2->closeCursor();
}

header('Location: ../vue/gestion_groupe.php?login=' . $login);
exit;
