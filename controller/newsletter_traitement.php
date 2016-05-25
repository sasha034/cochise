<?php
        //Vérification par regex de l'email destinataire et gestion de la faille XSS
        //if (isset(filter_input(INPUT_POST, 'email'))) {
            $_POST['email'] = htmlspecialchars($_POST['email']); // On rend inoffensives les balises HTML que le visiteur a pu rentrer
            
            if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", filter_input(INPUT_POST, 'email'))) {
                
                
                echo '<p>Votre message a bien été envoyé</p>';
                try {

                    $bdd = new PDO('mysql:host=localhost;dbname=cochise;charset=utf8', 'root', '');
                    
                } catch (Exception $e) {

                    die('Erreur : ' . $e->getMessage());
                }
            } else {
                echo 'Votre email destinataire est invalide';
                
                ?>
<p><a href="../vue/newsletter.php">Retournez au formulaire</a></p>
                <?php
            }
       // }
$destinataire = filter_input(INPUT_POST, 'email');
$objet = filter_input(INPUT_POST, 'objet');
$pj = filter_input(INPUT_POST, 'pj');
$message = filter_input(INPUT_POST, 'message');

require '../ressources/PHPMailer-master/PHPMailerAutoload.php';

$mail = new PHPMailer();

$mail->SMTPDebug = 2;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host ='smtp.mail.yahoo.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'anthony.ezar@yahoo.fr';                 // SMTP username
$mail->Password = '';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('anthony.ezar@yahoo.fr', 'Client');
$mail->addAddress('sasha034@hotmail.fr', 'Antho034');     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
$mail->addReplyTo('anthony.ezar@yahoo.fr', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = $objet;
$mail->Body    = $message;
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}       