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
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    </head>
    <body>
        <div class="header">
            <img src="../ressources/images/banniere.png" alt="bannière du site" />
        </div> 
        <div id="block-page-gestion-groupe">
            <div>
                <h3><strong class="log"><?php echo filter_input(INPUT_GET, 'login'); ?></strong>, vous voici sur la page de gestion de votre historique d'envoi de newsletter.</h3>
            </div>
            
            <div id=""><a href="menu.php?login=<?php echo filter_input(INPUT_GET, 'login'); ?>">Retour à la page d'accueil</a></div>

            <div id="block_csv" style="display:none; width: 100%; text-align:left">
                <p id="creationDate" class="DateEnvoi"></p>
                <p id="msgFrom" class="De"></p>
                <p id="msgTo" class="Vers"></p>
                <p id="object" class="Objet"></p>
                <p id="pj" class="Pj"></p>
                <p id="message" class="Message"></p>
                <p id="sent" class="Envoyé"></p>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>Date de création</th>
                        <th>De</th>
                        <th>Vers</th>
                        <th>Objet</th>
                        <th>PJ</th>
                        <th>Message</th>
                        <th>Envoyé</th>
                        <th>Afficher</th>
                    </tr>
                </thead>
                <tbody>

            <?php
            $getHisto = "SELECT * FROM HISTORIQUE ORDER BY creationDate desc";
            $resultat = $bdd->query($getHisto) or die(print_r($bdd->errorInfo()));
            while ($donnees = $resultat->fetch(PDO::FETCH_ASSOC)) {
                echo '<tr>
                        <td id="cd">'; echo $donnees['creationDate']; echo '</td>
                        <td id="mf">'; echo $donnees['msgFrom']; echo '</td>
                        <td id="mt">'; echo (strlen($donnees['msgTo']) > 50) ? (substr($donnees['msgTo'], 0, 50).'...') : $donnees['msgTo']; echo '</td>
                        <td id="obj">'; echo $donnees['object']; echo '</td>
                        <td id="haspj">'; echo ($donnees['pj']==0) ? 'Aucune' : 'Oui'; echo '</td>
                        <td id="msg">'; echo (strlen($donnees['message']) > 50) ? (substr($donnees['message'], 0, 50).'...') : $donnees['message']; echo '</td>
                        <td id="snt">'; echo ($donnees['sent']==0) ? 'Non' : 'Oui'; echo '</td>
                        <td><input onclick="afficher(this.id)" type="submit" value="Afficher" id="'; echo $donnees["id"]; echo '"></td>
                      </tr>
                     ';
            }
            ?>
                </tbody>

            </table>
        </div>

        <script>
            function afficher(id){
                $("#block_csv").show();
                $.ajax({
                    url: 'getMails.php?action=getHistoryById&id='+id,
                    type: 'GET',
                    success: function(data){
                        var response = JSON.parse(data);
                        $.each(response, function(key, value){
                            var l = $('#'+key);
                            l.html(l.attr('class')+' : '+value);
                        });
                    }
                });
            }
        </script>

    </body>
</html>



