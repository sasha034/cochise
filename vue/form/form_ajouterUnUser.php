<!DOCTYPE html>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /> 
        <title>Incription</title>
        <link rel="stylesheet" href="../../ressources/css/style.css" />
    </head>
    <body>
        <div id="block-ajouter-user">
            <img class="header" src="../../ressources/images/banniere1.png" alt="banni�re du site" />
            <form id="form_ajouterUnUser" name="form_ajouterUnUser" action="../../controller/user.action.ajouter.php" method="POST" onsubmit=" return checkRegex();">
                <div id="intro"><p>Bienvenue sur votre formulaire d'inscription</p></div>
                <fieldset>
                    <label id="login" for="login">Login * :</label><input type="text" name="login" id="login" /><br />
                    <label id="password" for="password">Mot de passe * :</label><input type="password" name="password" id="password" /><br />
                    <label id="nom_user" for="nom_user">Nom * :</label><input type="text" name="nom_user" id="nom_user" /><br />
                    <label id="email_user" for="email_user">Email *:</label><input type="text" name="email_user" id="email_user" /><br />
                    <p><input class='bouton_validation' type="submit" value="Valider inscription" name="bouton_validation"/></p>
                    <p>(*) champs obligatoires</p>
                    <div><a href="../../index.php">Retour</a></div>
                </fieldset>
            </form>
        </div>
    </body>
</html>