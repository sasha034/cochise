<?php
session_start();
?>
<!DOCTYPE html>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>Cochise Soft</title>
        <link rel="stylesheet" href="../ressources/css/style.css" />       
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script type="text/javascript" src="../js/jquery/jquery.autocomplete.min.js"></script>      
    </head>
    <body>
        <div class="header"><img src="../ressources/images/banniere1.png" alt="bannière cochise"/></div>
        <div id="block-newsletter">
            <p>Bienvenue <strong class="log"><?php echo filter_input(INPUT_GET, 'login'); ?></strong></p>
            <h2>Envoyez votre Newsletter</h2>
            
            
            <form method="POST" action="../controller/newsletter_traitement.php" name="formulaire_Newsletter" onsubmit=" return emailEmpty();">
                <p>
                    <label for="email" >Email : </label><br />
                    <input type="text" id="email" name="email" size="25" /><br />
                    <label for="objet" >Objet : </label><br />
                    <input type="text" id="objet"  name="objet" size="25" /><br />
                    <label for="pj" >Pièce(s) jointe(s) : </label><br />
                    <input type="file" id="pj"  name="pj" size="25" /><br />
                    <label for="message">Message: </label><br />  
                    <textarea name="message" rows="10" id="message" cols="48"> </textarea>
                </p>
                <div><input type="submit" value="Envoyer" name="submit" /> <input type="reset" name="reset" value="Effacer" /></div>
                <p></p>
                <div><a href="menu.php?login=<?php echo filter_input(INPUT_GET, 'login'); ?>">Retour à la page d'accueil</a></div>
                <p></p>
            </form>
        </div>
        <script type="text/javascript">
            $(document).ready(function () {
                $('#email').autocomplete({
                    serviceUrl: 'autocomplete.php',
                    dataType: 'json'
                });
            });
        </script>
    </body>
</html>
