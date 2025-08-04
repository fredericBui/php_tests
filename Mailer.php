<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // PHPMailer installé via Composer

class Mailer
{
    private PHPMailer $mailer;

    public function __construct()
    {
        $this->mailer = new PHPMailer(true);
        $this->mailer->isSMTP();
        $this->mailer->Host = 'sandbox.smtp.mailtrap.io';
        $this->mailer->SMTPAuth = true;
        $this->mailer->Username = 'TON_USERNAME_MAILTRAP';
        $this->mailer->Password = 'TON_PASSWORD_MAILTRAP';
        $this->mailer->SMTPSecure = 'tls';
        $this->mailer->Port = 2525;
        $this->mailer->setFrom('no-reply@monapp.test', 'Mon App');
    }

    public function sendConfirmation(string $toEmail): bool
    {
        try {
            $this->mailer->addAddress($toEmail);
            $this->mailer->Subject = 'Confirmation de votre inscription';
            $this->mailer->Body = 'Merci pour votre inscription ! Cliquez sur ce lien pour confirmer...';
            $this->mailer->send();
            return true;
        } catch (Exception $e) {
            error_log("Erreur mail : " . $e->getMessage());
            return false;
        }
    }
}
