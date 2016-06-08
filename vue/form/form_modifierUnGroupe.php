<!DOCTYPE html>
<?php include_once '../../modele/connexionBdd.php'; ?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /> 
        <title>Ajouter des membres dans un groupe</title>
        <link rel="stylesheet" href="../../ressources/css/style.css" />
    </head>
    <body>
        <div id="lightbox2">
            <h2>Ajoutez des membres dans un groupe</h2>
            <div>
                <form id="ajoutMembreGroupe" name="ajoutMembreGroupe" action="../controller/groupe.action.modifier.php" method="POST">
                    <div id="intro1"><p>S�lectionnez les membres que vous souhaitez ajouter � votre groupe</p></div>
                    <h3>Voici votre liste de membres: </h3>
                    <!-- tableau lister Membre -->
                    <input type="hidden" name="idGroupeSelected" value="<?php echo filter_input(INPUT_GET, "idGroupe"); ?>" />
                    <table id='tabMembre1'>
                        <tr><th>SELECTIONNEZ</th><th>IDMEMBRE</th><th>EMAIL</th><th>NOM</th><th>PRENOM</th></tr>
                        <?php
                        $idG = filter_input(INPUT_GET, "idGroupe");
                        $reponse = $bdd->query("SELECT m.IDMEMBRE, m.EMAIL, m.NOM, m.PRENOM FROM MEMBRE m WHERE m.IDMEMBRE NOT IN( SELECT me.IDMEMBRE FROM APPARTENIR a, GROUPE g, MEMBRE me WHERE me.IDMEMBRE = a.IDMEMBRE AND g.IDGROUPE = a.IDGROUPE AND a.IDGROUPE = $idG)");
                        while ($donneesMembres = $reponse->fetch()) {
                            ?>
                            <tr>
                                <td><input type="checkbox" name="checked_members[]" class="membre_checked" value="<?php echo $donneesMembres['IDMEMBRE']; ?>"/></td>
                                <td><?php echo $donneesMembres['IDMEMBRE']; ?></td>
                                <td><?php echo $donneesMembres['EMAIL']; ?></td>
                                <td><?php echo $donneesMembres['NOM']; ?></td>
                                <td><?php echo $donneesMembres['PRENOM']; ?></td>
                            </tr>
                            <?php
                        }
                        ?>                       
                    </table>
                    <p><input class='ValiderMembres' type="submit" value="Validez" name="ValiderMembres" /></p>
                </form>
            </div>
        </div>
    </body>
</html>


