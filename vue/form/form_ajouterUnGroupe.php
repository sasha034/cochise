<?php
session_start();
include_once '../../modele/connexionBdd.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Ajouter un groupe</title>
        <link rel="stylesheet" href="../../ressources/css/style.css" />
    </head>
    <body>
        <div class="header">
            <a href="menu.php?login=<?php echo $_SESSION['login']?>">
                <img src="../../ressources/images/banniere1.png" alt="bannière du site" class="arrondi_image"/>
            </a>
        </div> 
        <div id="block-page-form-ajouter-groupe">
            <h2 class="h2style">Formulaire d'ajout de groupe</h2>
            <div>
                <form id="form_AjouterUnGroupe" name="form_AjouterUnGroupe" action="../../controller/groupe.action.ajouter.php" method="POST">
                    <div id="intro"><p>Ajouter un groupe en le créant ci-dessous</p></div>                    
                        <label id="nom_groupe" for="nom_groupe">Nom du groupe * :</label><input type="text" name="nom_groupe" id="nom_groupe" /><br />
                        <p><input class='bouton_ajouterUnGroupe' type="submit" value="Ajouter Groupe" name="bouton_ajouterUnGroupe"/></p>
                        <p>(*) champs obligatoires</p>
                        <div><a href="../gestion_groupe.php?login=<?php echo filter_input(INPUT_GET, "login"); ?>">Retour</a></div>                    
                </form>
            </div>
        </div>
    </body>
</html>