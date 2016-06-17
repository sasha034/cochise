<?php
//Vérification par regex de l'email destinataire et gestion de la faille XSS
//if (isset(filter_input(INPUT_POST, 'email'))) {

//$_POST['email'] = htmlspecialchars($_POST['email']); // On rend inoffensives les balises HTML que le visiteur a pu rentrer

include('../modele/connexionBdd.php');
require '../ressources/PHPMailer-master/PHPMailerAutoload.php';

$targets = explode(',',$_POST["targets"]);
$mails = [];

foreach($targets as $target){
    if(preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $target)){
        $mails[] = $target;
    } elseif(preg_match("#([0-9]*)#", $target)) {
        $requete = "SELECT m.EMAIL as EMAIL FROM MEMBRE m
                    INNER JOIN APPARTENIR a ON a.IDMEMBRE = m.IDMEMBRE
                    WHERE a.IDGROUPE = ".$target;

        $resultat = $bdd->query($requete) or die(print_r($bdd->errorInfo()));

        while ($donnees = $resultat->fetch(PDO::FETCH_ASSOC)) {
            $mails[] = $donnees['EMAIL'];
        }
    }
}

$from = 'anthony.ezar@yahoo.fr';
$destinataire = filter_input(INPUT_POST, 'email');
$objet = filter_input(INPUT_POST, 'objet');
$pj = filter_input(INPUT_POST, 'pj');
(empty($pj)) ? $hasPj = 0 : $hasPj = 1;
$message = filter_input(INPUT_POST, 'message');


$mail = new PHPMailer();

$mail->SMTPDebug = 2;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host ='smtp.mail.yahoo.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'anthony.ezar@yahoo.fr';                 // SMTP username
$mail->Password = 'machala88';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom($from, 'Client');

// Ajouter un foreach mails -> addAddress
foreach($mails as $email){
    $mail->addAddress($email);
}

//$mail->addAddress('sasha034@hotmail.fr', 'Antho034');     // Add a recipient
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

$sent = 0;

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
    $sent = 1;
}

$destinataires = implode(', ',$mails);

$reqHisto = "INSERT INTO HISTORIQUE ( msgFrom, msgTo, object, pj, message, sent) VALUES ('$from', '$destinataires', '$objet', $hasPj, '$message', $sent)";
$resultReqHisto = $bdd->query($reqHisto) or die(print_r($bdd->errorInfo()));
