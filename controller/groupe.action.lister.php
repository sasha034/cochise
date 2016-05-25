<?php
include_once '../modele/connexionBdd.php';
$idG = filter_input(INPUT_GET, 'idGroupe');
$reponse = $bdd->query('SELECT G.NOMGROUPE FROM GROUPE G WHERE G.IDGROUPE = ' . $idG);
$data = $reponse->fetch();
$data1 = $data[0];

$reponse1 = $bdd->query('SELECT DISTINCT g.NOMGROUPE FROM groupe g, appartenir a WHERE a.IDGROUPE = g.IDGROUPE AND a.IDGROUPE = ' . $idG);
$donneesGroupes = $reponse1->fetch();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>Consultez groupe</title>
        <script type="text/javascript" src="../js/jquery/jquery-1.4.3.min.js"></script>
        <link rel="stylesheet" href="../ressources/css/style.css" />
    </head>
    <body>
        <div id="lightbox1">
            <table id='tabMembre'>
                <thead>
                    <tr>Liste des membres appartenant au groupe <?php echo $donneesGroupes['NOMGROUPE'] ?></tr>
                    <p></p>
                    <tr><th>IDMEMBRE</th><th>EMAIL</th><th>NOM</th><th>PRENOM</th><th><img src="../ressources/images/delete1.png" alt="delete_button"/></th></tr>
                </thead>
                <tbody>
                    <?php
                    $reponse1->closeCursor();
                    $reponse2 = $bdd->query('SELECT M.IDMEMBRE, M.EMAIL, M.NOM, M.PRENOM FROM MEMBRE M,GROUPE G, APPARTENIR A WHERE G.IDGROUPE = A.IDGROUPE AND A.IDMEMBRE = M.IDMEMBRE AND G.IDGROUPE = ' . $idG);
                    while ($donneesMembres = $reponse2->fetch()) {
                        ?>                    

                        <tr>
                            <td><?php echo $donneesMembres['IDMEMBRE']; ?></td>
                            <td><?php echo $donneesMembres['EMAIL']; ?></td>
                            <td><?php echo $donneesMembres['NOM']; ?></td>
                            <td><?php echo $donneesMembres['PRENOM']; ?></td>
                            <td><a href="../controller/membre.action.supprimer.php?idMembre=<?php echo $donneesMembres['IDMEMBRE']; ?>&amp;idGroupe=<?php echo $idG; ?>"><img src="../ressources/images/delete1.png" alt="delete_button"/></a></td>
                        </tr>

                        <?php
                    }
                    $reponse2->closeCursor();
                    ?>   
                </tbody>
            </table>
            <p id="p">.</p>
        </div>
        <script>
            $(document).ready(function () {
                $("#p").css("color", "#232323");
            });
        </script>
    </body>
</html>
