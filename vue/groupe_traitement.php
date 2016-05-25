<?php

include_once '../modele/connexionBdd.php';
//page qui gère l'extraction des données du fichier CSV envoyé par l'user, et les tranfert en base.
$html = '<div><p>Votre fichier CSV a bien été envoyé.</p></div>';

//upload du fichier CSV
$nomFichierCsv = $_FILES['csv']['name'];
if (isset($_FILES['csv']) AND $_FILES['csv']['error'] == 0) {
    // Testons si le fichier n'est pas trop gros
    if ($_FILES['csv']['size'] <= 1000000) {
        // Testons si l'extension est autorisée
        $infosfichier = pathinfo($_FILES['csv']['name']);
        $extension_upload = $infosfichier['extension'];
        $extensions_autorisees = array('csv');
        if (in_array($extension_upload, $extensions_autorisees)) {
            // On peut valider le fichier et le stocker définitivement
            move_uploaded_file($_FILES['csv']['tmp_name'], '../uploads/' . $nomFichierCsv);
            echo $html;
        }
    }
}
//Extraction des données du CSV uploadé vers la base de données
if (($handle = fopen("../uploads/" . $nomFichierCsv, "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
        //print_r($data);
        for ($i = 0; $i < $num; $i++) {
            $tabBrut = explode(";", $data[$i]);
            //echo $tabBrut[$i].$tabBrut[$i+1]. $tabBrut[$i+2].  "</br>";
            $req = $bdd->prepare('INSERT INTO membre(EMAIL, NOM, PRENOM) VALUES(:EMAIL, :NOM, :PRENOM)');
            $req->execute(array(
                'EMAIL' => $tabBrut[$i],
                'NOM' => $tabBrut[$i+1],                
                'PRENOM' => $tabBrut[$i+2]
            ));
            $req->closeCursor();
        }
    }
    fclose($handle);
}


