<?php
session_start();

?>
<!DOCTYPE html>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Cochise Soft</title>
        <link rel="stylesheet" href="../ressources/css/style.css" />
        <link rel="stylesheet" href="../js/multiselect/dist/css/bootstrap-select.css">
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script type="text/javascript" src="../js/jquery/jquery.autocomplete.min.js"></script>
        <script type="text/javascript" src="../js/multiselect/dist/js/bootstrap-select.js"></script>


        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">


        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="header">
            <a href="menu.php?login=<?php echo $_SESSION['login'] ?>">
                <img src="../ressources/images/banniere1.png" alt="bannière cochise" class="arrondi_image"/>
            </a>
        </div>
        <div id="block-newsletter" class="trebuchet">
            <p class='phraseLog'>Bienvenue <strong class="log"><?php echo filter_input(INPUT_GET, 'login'); ?></strong></p>
            <h2>Envoyez votre Newsletter</h2>
            
            
            <div id="form">
                <p>
                    <select class="selectpicker" id="targets" multiple data-live-search="true" data-width="75%" data-actions-box="true" data-selected-text-format="count" data-style="btn-primary">
                    </select>

                    <!--<label for="email" >Email : </label><br />
                    <input type="text" id="email" name="email" size="25" />-->

                    <br />
                    <label for="objet" >Objet : </label><br />
                    <input type="text" id="objet"  name="objet" size="25" style="color:black"/><br />
                    <label for="pj" >Pièce(s) jointe(s) : </label><br />
                    <input type="file" id="pj"  name="pj" size="25" /><br />
                    <label for="message">Message: </label><br />  
                    <textarea name="message" rows="10" id="message" cols="48"style="color:black"> </textarea>
                </p>
                <div class='alignerDiv1' style="color: black">
                    <input  type="submit" value="Envoyer" name="submit" id="validateForm"/> <input type="reset" name="reset" value="Effacer" />
                </div>
                
                <div class='alignerDiv2'><a style="color: #FF009E" href="menu.php?login=<?php echo filter_input(INPUT_GET, 'login'); ?>">Retour à la page d'accueil</a></div>
                <p></p>
            </div>
        </div>
        <script type="text/javascript">
            $(document).ready(function () {
//                $('#email').autocomplete({
//                    serviceUrl: 'autocomplete.php',
//                    dataType: 'json'
//                });

                $('#validateForm').click(function () {
                    var objet = $('#objet').val();
                    var message = $('#message').val();
                    var targets = $('#targets').val();

                    var targetsString  = targets.join();


                    $.ajax({
                        url: '../controller/newsletter_traitement.php',
                        type: 'POST',
                        data: { targets: targetsString, message: message, objet: objet },
                        success: function (data) {
                            alert(data);
                        }
                    });
                });

                setTimeout(function(){
                    $.ajax({
                        url: 'getMails.php?action=getMails',
                        type: 'GET',
                        success: function(data){
                            var response = JSON.parse(data);
                            var selectpicker = $(".selectpicker");

                            for(var i = 0; i < response.length; i++){
                                selectpicker.append(
                                    "<option value='"+response[i]+"'>"+response[i]+"</option>"
                                ).selectpicker('refresh');
                            }

                        }
                    });
                },500);


                $.ajax({
                    url: 'getMails.php?action=getGroups',
                    type: 'GET',
                    success: function(data2){
                        var response2 = JSON.parse(data2);
                        var selectpicker = $(".selectpicker");

                        $.each(response2, function(key, value){
                            selectpicker.append(
                                "<option data-subtext='Groupe' value='"+key+"'>"+value+"</option>"
                            ).selectpicker('refresh');
                        });

                        selectpicker.append(
                            "<option data-divider='true'></option>"
                        ).selectpicker('refresh');

                    }
                })
            });

            $('.selectpicker').selectpicker({
                style: 'btn-info',
                size: 10
            });




        </script>
    </body>
</html>
