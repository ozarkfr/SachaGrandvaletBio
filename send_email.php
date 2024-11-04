<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = strip_tags(trim($_POST["message"]));

    if (empty($name) || empty($email) || empty($message)) {
        echo "Tous les champs sont requis.";
        exit;
    }

    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // SMTP de Gmail
        $mail->SMTPAuth = true;
        $mail->Username = 'tonemail@gmail.com'; // Ton email Gmail
        $mail->Password = 'tonmotdepasse'; // Ton mot de passe (ou mot de passe d'application)
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Définir l'expéditeur et le destinataire
        $mail->setFrom('tonemail@gmail.com', 'Ton Nom');
        $mail->addAddress('sachagrdvlt@gmail.com'); // L'adresse qui recevra le message

        // Contenu de l'email
        $mail->isHTML(false);
        $mail->Subject = "Nouveau message de contact de $name";
        $mail->Body = "Nom: $name\nEmail: $email\n\nMessage:\n$message";

        $mail->send();
        echo "Merci pour votre message, je vous répondrai bientôt !";
    } catch (Exception $e) {
        echo "Erreur lors de l'envoi de l'email : {$mail->ErrorInfo}";
    }
} else {
    echo "Méthode non autorisée.";
}
?>
