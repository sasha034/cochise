<!DOCTYPE html>
<?php
$idG = filter_input(INPUT_GET, 'idGroupe');
$login = filter_input(INPUT_GET, 'login');
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" href="../../ressources/css/style.css" />
        <title>Ajouter un membre</title>
    </head>
    <body>
        <div id="block-page-ajouter-membre">
            <img class="header" src="../../ressources/images/banniere1.png" alt="bannière du site" />
            <h2>Formulaire d'inscription de membre</h2>
            <div>


                <form id="form_AjouterUnMembre" name="form_AjouterUnMembre" action="../../controller/membre.action.ajouter.php?login=<?php echo $login; ?>" method="POST">
                    <div id = "intro">
                        <p>Ajouter un membre en le créant ci-dessous</p>
                    </div>
                    <fieldset>
                        <label id = "email_membre" for = "email_membre">Email * :</label><input type = "text" name = "email_membre" id = "email_membre" /><br />
                        <label id = "nom_membre" for = "nom_membre">Nom * :</label><input type = "text" name = "nom_membre" id = "nom_membre" /><br />
                        <label id = "prenom_membre" for = "prenom_membre">Prénom * :</label><input type = "text" name = "prenom_membre" id = "prenom_membre" /><br />
                        <p><input class = "bouton_ajouterUnMembre" type = "submit" value = "Ajouter Membre" name = "bouton_ajouterUnMembre"/></p>
                        <p>(*) champs obligatoires</p>
                        <div>
                            <a href = "../gestion_groupe.php?login=<?php echo $login; ?>">Retour</a>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </body>
</html>;

