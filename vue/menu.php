<?php
session_start();
include_once '../modele/connexionBdd.php';

$_SESSION['login'] = filter_input(INPUT_POST, 'pseudo');
$_SESSION['pseudo'] = filter_input(INPUT_POST, 'pseudo');

$pseudo = htmlspecialchars(filter_input(INPUT_POST, 'pseudo'));
$mdpTemp = $bdd->query('SELECT PASSWORD FROM user WHERE LOGIN = "' . $pseudo . '"');
$mdpBase = $mdpTemp->fetch();
$mdp = md5(htmlspecialchars(filter_input(INPUT_POST, 'password')));

if ($mdpBase['PASSWORD'] === $mdp || filter_input(INPUT_GET, 'login') != null) {
    ?>
    <!DOCTYPE html>
    <html>
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /> 
            <title>Menu</title>
            <link rel="stylesheet" href="../ressources/css/style.css" />
        </head>
        <body>
            <div class="header">
                <img src="../ressources/images/banniere.png" alt="bannière du site" />
            </div>
            <div id="body_menu">                
                <p>Bienvenue <strong class="log"><?php 
                                     if (isset($_SESSION['login'])){
                                         echo $_SESSION['login'];
                                     }else{
                                         echo filter_input(INPUT_GET,'login');
                                     }                                        
                                        ?>
                            </strong> !</p>
                <h1>MENU</h1>
                <div id="newsletter" class="menu_icone"><a href="newsletter.php?login=<?php 
                                     if (isset($_SESSION['login'])){
                                         echo $_SESSION['login'];
                                     }else{
                                         echo filter_input(INPUT_GET,'login');
                                     }?>"><img src="../ressources/images/mail1.jpg" /></a><h3>NEWSLETTER</h3></div>                
                <div id="gestion" class="menu_icone"><a href="gestion_groupe.php?login=<?php 
                                     if (isset($_SESSION['login'])){
                                         echo $_SESSION['login'];
                                     }else{
                                         echo filter_input(INPUT_GET,'login');
                                     }?>"><img src="../ressources/images/gestion1.jpg" /></a><h3>CONTACTS</h3></div>                                                        
                <div id="histo" class="menu_icone"><a href="historique.php?login=<?php 
                                     if (isset($_SESSION['login'])){
                                         echo $_SESSION['login'];
                                     }else{
                                         echo filter_input(INPUT_GET,'login');
                                     }?>"><img src="../ressources/images/histo1.jpg" /></a><h3>HISTORIQUE</h3></div>                
                <div id="deconnexion"><a href="../index.php">Déconnexion</a></div>
            </div>
        </body>
    </html>
    <?php
} else {
    header('Location: error.php');    
}