<?php
session_start();
include_once '../modele/connexionBdd.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Cochise Soft</title>
        <link rel="stylesheet" href="../ressources/css/style.css" />
    </head>
    <body>
        <div class="header">
            <img src="../ressources/images/banniere.png" alt="bannière du site" />
        </div> 
        <div id="block-page-gestion-groupe">
            <div>
                <h3><strong class="log"><?php echo filter_input(INPUT_GET, 'login'); ?></strong>, vous voici sur la page de gestion de votre historique d'envoi de newsletter.</h3>
            </div>
            
            <div id=""><a href="menu.php?login=<?php echo filter_input(INPUT_GET, 'login'); ?>">Retour � la page d'accueil</a></div>
            
        </div>
    </body>
</html>



