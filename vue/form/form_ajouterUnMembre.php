<!DOCTYPE html>
<?php
$idG = filter_input(INPUT_GET, 'idGroupe');

$html = '<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <link rel="stylesheet" href="../../ressources/css/style.css" />
        <title>Ajouter un membre</title>
    </head>
    <body>
        <div id="block-page-ajouter-membre">
            <img class="header" src="../../ressources/images/banniere1.png" alt="banni�re du site" />
            <h2>Formulaire d\'inscription de membre</h2>
            <div>';


$html .='       <form id="form_AjouterUnMembre" name="form_AjouterUnMembre" action="../../controller/membre.action.ajouter.php" method="POST">';
$html .='       <div id = "intro">
                    <p>Ajouter un membre en le cr�ant ci-dessous</p>
                </div>
                    <fieldset>
                        <label id = "email_membre" for = "email_membre">Email * :</label><input type = "text" name = "email_membre" id = "email_membre" /><br />
                        <label id = "nom_membre" for = "nom_membre">Nom * :</label><input type = "text" name = "nom_membre" id = "nom_membre" /><br />
                        <label id = "prenom_membre" for = "prenom_membre">Pr�nom * :</label><input type = "text" name = "prenom_membre" id = "prenom_membre" /><br />
                        <p><input class = "bouton_ajouterUnMembre" type = "submit" value = "Ajouter Membre" name = "bouton_ajouterUnMembre"/></p>
                        <p>(*) champs obligatoires</p>
                        <div>
                            <a href = "../gestion_groupe.php">Retour</a>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </body>
    </html>';

echo $html;