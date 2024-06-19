<?php
session_start();

$listaModelli = $_SESSION["listaM"];
$listaPezzi = $_SESSION["listaP"];
$somma = $_SESSION["somma"];
$email = $_POST['mail'];

$stringaModelli = "";

$lunghezza = count($listaModelli);
for ($i = 0; $i < $lunghezza; $i++) {
    
    
    $stringaModelli .= "Ordine: ". ($i +1) .  " " . $listaModelli[$i] . "<br>";
    $stringaModelli .="In " . $listaPezzi[$i] . " pezzi" . "<br>";
}
// Includi i file di PHPMailer
require 'lib/PHPMailer.php';
require 'lib/SMTP.php';
require 'lib/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

try {
    // Configurazione del server SMTP
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'inserracarlo@gmail.com'; // Il tuo indirizzo Gmail
    $mail->Password   = 'nbgr docu ywwp thhi';  // La tua password Gmail (o la password dell'app)
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    // Destinatario
    $mail->setFrom('inserracarlo@gmail.com', 'negozio Talentform');
    $mail->addAddress($email, 'Recipient Name');

    // Contenuto dell'email
    $mail->isHTML(true);
    $mail->Subject = 'Ordine confermato';
    $mail->Body    = $stringaModelli . " per la somma di: " . $somma;
    $mail->AltBody = 'This is a test email sent from PHP using PHPMailer.';

    $mail->send();
    echo 'Email inviata con successo';
} catch (Exception $e) {
    echo "Errore nell'invio dell'email: {$mail->ErrorInfo}";
}



?>