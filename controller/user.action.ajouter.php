<?php

include_once '../modele/connexionBdd.php';

$email_user = filter_input(INPUT_POST, 'email_user');
$nom_user = filter_input(INPUT_POST, 'nom_user');
$login = filter_input(INPUT_POST, 'login');
$password = md5(filter_input(INPUT_POST, 'password'));



$_POST['email'] = htmlspecialchars($_POST['email_user']); // On rend inoffensives les balises HTML que le visiteur a pu rentrer

if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", filter_input(INPUT_POST, 'email_user'))) {
    
    $req = $bdd->prepare('INSERT INTO `USER`(EMAIL, NOM, LOGIN, PASSWORD) VALUES(:EMAIL, :NOM, :LOGIN, :PASSWORD )');
    $req->execute(array(
        'NOM' => $nom_user,
        'EMAIL' => $email_user,
        'LOGIN' => $login,
        'PASSWORD' => $password
    ));
    $req->closeCursor();

    echo '<!DOCTYPE html>
                        <html>
                            <head>
                                <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /> 
                                <title>Menu</title>
                                <link rel="stylesheet" href="../ressources/css/style.css" /> 
                            </head>
                            <body>
                                <div>
                                    <p>F�licitations  <strong><?php echo $login ?></strong> ! Votre profil a bien �t� enregistr� !</p>
                                    <p>Vous pouvez d�sormais vous connecter avec votre login et le mot de passe que vous venez d\'enregistrer.</p>
                                    <a href="../index.php">Authentifiez-vous ici!</a>

                                </div>
                            </body>    
                        </html>';
    try {

        $bdd = new PDO('mysql:host=localhost;dbname=cochise;charset=utf8', 'root', '');
    } catch (Exception $e) {

        die('Erreur : ' . $e->getMessage());
    }
} else {
    echo '<!DOCTYPE html>
                        <html>
                            <head>
                                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
                                <title>Menu</title>
                                <link rel="stylesheet" href="../ressources/css/style.css" /> 
                            </head>
                            <body>
                                <div>
                                <p>Impossible de créer votre compte, l\'adresse email est invalide.</p>
                                <p><a href="../vue/form/form_ajouterUnUser.php">Retournez au formulaire</a></p>
                                </div>
                            </body>
                        </html>';
   

}
?>
