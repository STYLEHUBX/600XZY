<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $amount = $_POST['amount'];
    $withdrawAddress = $_POST['withdraw-address'];
    $userEmail = $_POST['email'];

    $mail = new PHPMailer(true);
    try {
        // Configuración del servidor SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Usando SMTP de Gmail
        $mail->SMTPAuth = true;
        $mail->Username = 'magneginvip@gmail.com'; // Tu correo Gmail
        $mail->Password = 'your_email_password'; // Tu contraseña de Gmail o contraseña de aplicación
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Remitente y destinatario
        $mail->setFrom('magneginvip@gmail.com', 'Retiro de Fondos');
        $mail->addAddress('magneginvip@gmail.com');
        $mail->addReplyTo($userEmail);

        // Contenido del correo
        $mail->isHTML(true);
        $mail->Subject = 'Nuevo Retiro de Fondos';
        $mail->Body = "
            <p>Se ha solicitado un retiro de fondos.</p>
            <p><strong>Monto:</strong> $amount</p>
            <p><strong>Dirección de retiro:</strong> $withdrawAddress</p>
            <p><strong>Correo electrónico del solicitante:</strong> $userEmail</p>
        ";

        $mail->send();
        echo 'El mensaje ha sido enviado';
    } catch (Exception $e) {
        echo "El mensaje no pudo ser enviado. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
