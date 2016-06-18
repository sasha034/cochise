<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Authentification</title>
        <script src="js/validateConnexion.js"></script>
<!--        <script src="js/jquery/jquery-1.4.3.min.js"></script>-->
    </head>
    <body>
        <div class="header">
            <a>
                <img src="ressources/images/banniere1.png" alt="bannière du site" class="arrondi_image"/>
            </a>
        </div>
        <div id="form_login">            
            <form id="formulaireConnexion" name="formulaireConnexion" action="vue/menu.php" method="POST" onsubmit=" return validateConnexion();">
                <div id="intro">
                    <h4 class="h2style">Veuillez vous identifier pour accéder à l'application Cochise Soft</h4>
                </div>
                
                    <label for="pseudo">Pseudonyme *  :</label>
                    <input type="text" name="pseudo" id="pseudo" />
                    <br />

                    <label id="password" for="password">Mot de passe * :</label>
                    <input type="password" name="password" id="password" /><br />
                    <p>
                        <input id="validate" class='bouton' type="submit" value="Connexion" name="boutonConnexion"/>
                    </p>
                    <p>Pas encore inscris ?
                        <a href="vue/form/form_ajouterUnUser.php">Créer un compte</a>
                    </p>
                    <p>
                        (*) champs obligatoires
                    </p>
               
            </form>        
        </div>

        <script>
//            $('#pseudo').keyup(function () {
//                $("#formulaireConnexion").attr('action', 'vue/menu.php?login=' + $('#pseudo').val());
//            })
        </script>
    </body>
</html>