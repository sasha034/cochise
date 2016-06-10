<?php
session_start();
include_once '../modele/connexionBdd.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Cochise Soft</title>
        <script type="text/javascript" src="../js/jquery/jquery-1.4.3.min.js"></script>
        <script type="text/javascript" src="../js/jquery/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
        <script type="text/javascript" src="../js/jquery/fancybox/jquery.easing-1.3.4.pack.js"></script>
        <script type="text/javascript" src="../js/jquery/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
        <link rel="stylesheet" href="../js/jquery/fancybox/jquery.fancybox-1.3.4.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="../ressources/css/style.css" />

    </head>
    <body>
        <div class="header">
            <img src="../ressources/images/banniere.png" alt="bannière du site" />
        </div> 
        <div id="block-page-gestion-groupe">
            <div>
                <h2>Bienvenue <strong class="log"><?php echo filter_input(INPUT_GET, 'login'); ?></strong> sur votre page de gestion de vos membres et groupes.</h2>
            </div>
            
<!----------------------------------------------------------BLOCK CSV------------------------------------------------------------->

            <div id="block_csv">
                <p>Importez ici vos contacts via un fichier CSV</p>

                <form method="post" action="groupe_traitement.php" enctype="multipart/form-data">
                    <input type="file" name="csv" id="csv"/><br /> 
                    <p></p>
                    <input type="submit" value="Envoyer" name="submit" /> <input type="reset" name="reset" value="Effacer" />
                </form>
            </div>    
            <div id="back"><a href="menu.php?login=<?php echo filter_input(INPUT_GET, 'login'); ?>">Retour à la page d'accueil</a></div>
            <div></div>
            
<!-----------------------------------------------------------BLOCK MEMBRE----------------------------------------------------------->
            <div id="block_membre">
                <h3>Voici votre liste de membres: </h3>
                <!-- tableau lister Membre -->
                <div class="blockLienAdd"><a href="form/form_ajouterUnMembre.php?login=<?php echo filter_input(INPUT_GET, 'login'); ?>"><img class="lienAdd" src="../ressources/images/add1.png" alt="add_button"/>Ajouter un membre</a></div>
                <table id='tabMembre'>
                    <tr class="enteteTab"><th>IDMEMBRE</th><th>EMAIL</th><th>NOM</th><th>PRENOM</th><th><img src="../ressources/images/delete1.png" alt="delete_button"/></th></tr>
                    <?php
                    $reponse = $bdd->query('SELECT * from MEMBRE');
                    while ($donneesMembres = $reponse->fetch()) {
                        ?>
                        <tr>
                            <td><?php echo $donneesMembres['IDMEMBRE']; ?></td>
                            <td><?php echo $donneesMembres['EMAIL']; ?></td>
                            <td><?php echo $donneesMembres['NOM']; ?></td>
                            <td><?php echo $donneesMembres['PRENOM']; ?></td>
                            <td><a href="../controller/membre.action.supprimer.php?idMembre=<?php echo $donneesMembres['IDMEMBRE']; ?>"><img src="../ressources/images/delete1.png" alt="delete_button"/></a></td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>

            </div>
             
<!---------------------------------------------------------BLOCK GROUPE----------------------------------------------------------------->
             
            <div id="block_groupe">
                <h3>Voici votre liste de groupes: </h3>
                <!-- tableau lister Groupes -->
                <div class="blockLienAdd"><a href="form/form_ajouterUnGroupe.php?login=<?php echo filter_input(INPUT_GET, 'login'); ?>"><img class="lienAdd" src="../ressources/images/add1.png" alt="add_button"/>Ajouter un groupe</a></div>
                <table id='tabGroupe'>
                    <tr><th>IDGROUPE</th><th>NOMGROUPE</th><th>CONSULTER</th><th>MODIFIER</th><th><img src="../ressources/images/delete1.png" alt="delete_button"/></th></tr>
                    <?php
                    $response = $bdd->query('SELECT G.IDGROUPE, G.NOMGROUPE FROM GROUPE G');
                    while ($donneesGroupes = $response->fetch()) {
                        ?>
                        <tr>
                            <td><?php echo $donneesGroupes['IDGROUPE']; ?></td>
                            <td><?php echo $donneesGroupes['NOMGROUPE']; ?></td>
                            <td><a id="fancybox1" href="../controller/groupe.action.lister.php?idGroupe=<?php echo $donneesGroupes['IDGROUPE']; ?>&login=<?php echo filter_input(INPUT_GET, 'login'); ?>">consulter</a></td>
                            <td><a id="fancybox2" href="form/form_modifierUnGroupe.php?idGroupe=<?php echo $donneesGroupes['IDGROUPE']; ?>&login=<?php echo filter_input(INPUT_GET, 'login'); ?>">modifier</a></td>
                            <td><a href="../controller/groupe.action.supprimer.php?idGroupe=<?php echo $donneesGroupes['IDGROUPE']; ?>&login=<?php echo filter_input(INPUT_GET, 'login'); ?>"><img src="../ressources/images/delete1.png" alt="delete_button"/></a></td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>

            </div>
            <p></p>          

            <script>
                $(document).ready(function () {
                    $("a#fancybox1").fancybox({
                        'hideOnContentClick': false,
                        'hideOnOverlayClick': true
                    });
                    $("a#fancybox2").fancybox({
                        'hideOnContentClick': false,
                        'hideOnOverlayClick': true,
                        'autoDimensions': true,
                        'height': '50%'
                    });
                    
                    
                });
            </script>
        </div>
    </body>
</html>



