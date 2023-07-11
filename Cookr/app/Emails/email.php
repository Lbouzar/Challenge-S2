<?php

namespace App\Emails;

//For PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require dirname(__DIR__) . '/vendor/autoload.php';

class Email
{
    private $mail;
    private static $instance;
    public $contact;
    public $date;

    private function __construct()
    {
        $this->contact = 'href = "http://' . getenv('HTTP_HOST') . '/contact"';
        $this->date = date('Y');
        $this->mail = new PHPMailer(true);
        $this->mail->isSMTP();
        $this->mail->Host = 'smtp.gmail.com';
        $this->mail->SMTPAuth = true;
        $this->mail->Username = getenv("APP_EMAIL_ADRESS");
        $this->mail->Password = getenv("APP_EMAIL_PASSWORD");
        $this->mail->setFrom(getenv("APP_EMAIL_ADRESS"), 'Cookr Compagny');
        $this->mail->addEmbeddedImage(dirname(__DIR__, 2) . '/public/assets/img/logo-regular.jpg', "logo_cookr");
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $this->mail->Port = 465;
        $this->mail->isHTML(true);
    }

    public static function getInstance(): Email
    {
        if (!self::$instance) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    function register_mail($recipientAdress, $token): bool
    {
        $link = ' href = "http://' . getenv('HTTP_HOST') . '/confirm?' . http_build_query(['email' => $recipientAdress, 'token' => $token]) . '"';
        $this->mail->addAddress($recipientAdress);
        $this->mail->Subject = "Bienvenue chez Cookr";
        $this->mail->Body = strtr(file_get_contents(__DIR__ . '/register.html'), array('%link%' => $link, '%contact%' => $this->contact, '%date%' => $this->date));

        if (!$this->mail->send()) {
            return false;
        } else {
            return true;
        }
    }

    function update_mail($recipientAdress)
    {
        $this->mail->addAddress($recipientAdress);
        $this->mail->Subject = "Votre compte a été mis à jour";
        $this->mail->Body = strtr(file_get_contents(__DIR__.'/update.html'), array('%contact%' => $this->contact, '%date%' => $this->date));
        $this->mail->send();

    }

    function newsletter_welcome_mail()
    {
    }

    function contact_team_mail($senderMail, $senderName, $message, $recipients): bool
    {
        foreach ($recipients as $recipient) {
            $this->mail->ClearAllRecipients();
            $this->mail->addAddress($recipient["email"]);
            $this->mail->Subject = "Message utilisateur";
            $this->mail->Body = strtr(file_get_contents(__DIR__ . '/contact.html'), array('%userMail%' => $senderMail, '%userName%' => $senderName, '%message%' => $message));
            if (!$this->mail->send()) {
                return false;
            } else {
                return true;
            }
        }
    }

    function report_mail()
    {
    }
}
