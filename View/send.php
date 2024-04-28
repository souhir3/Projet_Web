<?php
include '../config1.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';

if (isset($_POST["emailrep"])) {
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'molkas206@gmail.com';
    $mail->Password = '';
   // $mail->SMTPSecure = 'tls';
   $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port = 465;
    $mail->setFrom('molkas206@gmail.com');
  //$mail->addAddress('molkas206@gmail.com');
  $email_p = ($_POST['emailrep']);
  $mail->addAddress($email_p);
    $mail->isHTML(true);
    $mail->Subject = 'Reponse de votre reclamation';
    $mail->Body = 'Bonjour Mr/Mme,<br><br>' . $_POST["messagerep"] .'<br>Cordialement,<br>L\'équipe de TUNISTYLE';
    
    // Send the email
    $mail->send();
}
?>
