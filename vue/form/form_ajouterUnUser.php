<?php
session_start();
include_once '../../modele/connexionBdd.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
        <title>Incription</title>
        <link rel="stylesheet" href="../../ressources/css/style.css" />
    </head>
    <body>
       <div class="header">
            <a href="../menu.php?login=<?php echo $_SESSION['login'] ?>">
                <img src="../../ressources/images/banniere1.png" alt="bannière du site" class="arrondi_image"/>
            </a>
        </div>
        <div id="block-ajouter-user">
            <form id="form_ajouterUnUser" name="form_ajouterUnUser" action="../../controller/user.action.ajouter.php" method="POST" onsubmit=" return checkRegex();">
                <div id="intro">
                    <p class="h2style">Bienvenue sur votre formulaire d'inscription</p>
                </div>
                <table class="lol">
                    <tr>
                        <td><label id="login" for="login">Login * :</label></td>
                        <td><input type="text" name="login" id="login" /></td>
                    </tr>
                    <tr>
                        <td><label id="password" for="password">Mot de passe * :</label></td>
                        <td><input type="password" name="password" id="password" /></td>
                    </tr>
                    <tr>
                        <td><label id="nom_user" for="nom_user">Nom * :</label></td>
                        <td><input type="text" name="nom_user" id="nom_user" /></td>
                    </tr>
                    <tr>
                        <td><label id="email_user" for="email_user">Email *:</label></td>
                        <td><input type="text" name="email_user" id="email_user" /></td>
                    </tr>
                    <tr style="height: 40px">
                        <td colspan="2"><input class='bouton_validation' type="submit" value="Valider inscription" name="bouton_validation"/></td>
                    </tr>
                </table>

                    <a href="../../index.php">Retour</a>
                    <p>(*) champs obligatoires</p>
                    
            </form>
        </div>
    </body>
</html>