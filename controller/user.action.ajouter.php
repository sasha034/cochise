<?php
include_once '../modele/connexionBdd.php';

$email_user = filter_input(INPUT_POST, 'email_user');
$nom_user = filter_input(INPUT_POST, 'nom_user');
$login = filter_input(INPUT_POST, 'login');
$password = md5(filter_input(INPUT_POST, 'password'));

$req = $bdd->prepare('INSERT INTO user(EMAIL, NOM, LOGIN, PASSWORD) VALUES(:EMAIL, :NOM, :LOGIN, :PASSWORD )');
$req->execute(array(
    'NOM' => $nom_user,
    'EMAIL' => $email_user,
    'LOGIN' => $login,
    'PASSWORD' => $password
));
$req->closeCursor();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /> 
        <title>Menu</title>
        <link rel="stylesheet" href="../ressources/css/style.css" />
    </head>
    <body>
        <div>
            <p>Félicitations  <strong><?php echo $login ?></strong> ! Votre profil a bien été enregistré !</p>
            <p>Vous pouvez désormais vous connecter avec votre login et le mot de passe que vous venez d'enregistrer.</p>
            <a href="../index.php">Authentifiez-vous ici!</a>

        </div>
    </body>    
</html>