<!DOCTYPE html>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>Ajouter un groupe</title>
        <link rel="stylesheet" href="../../ressources/css/style.css" />
    </head>
    <body>
        <div id="block-page-form-ajouter-groupe">
            <img class="header" src="../../ressources/images/banniere1.png" alt="bannière du site" />
            <h2>Formulaire d'ajout de groupe</h2>
            <div>
                <form id="form_AjouterUnGroupe" name="form_AjouterUnGroupe" action="../../controller/groupe.action.ajouter.php" method="POST">
                    <div id="intro"><p>Ajouter un groupe en le créant ci-dessous</p></div>
                    <fieldset>
                        <label id="nom_groupe" for="nom_groupe">Nom du groupe * :</label><input type="text" name="nom_groupe" id="nom_groupe" /><br />
                        <p><input class='bouton_ajouterUnGroupe' type="submit" value="Ajouter Groupe" name="bouton_ajouterUnGroupe"/></p>
                        <p>(*) champs obligatoires</p>
                        <div><a href="../gestion_groupe.php?login=<?php echo filter_input(INPUT_GET, "login");?>">Retour</a></div>
                    </fieldset>
                </form>
            </div>
        </div>
    </body>
</html>