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

    public function __construct()
    {
        $this->mail = new PHPMailer(true);
        $this->mail->isSMTP();
        $this->mail->Host = 'smtp.gmail.com';
        $this->mail->SMTPAuth = true;
        $this->mail->Username = getenv("APP_EMAIL_ADRESS");
        $this->mail->Password = getenv("APP_EMAIL_PASSWORD");
        $this->mail->setFrom(getenv("APP_EMAIL_ADRESS"), 'Cookr Compagny');
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $this->mail->Port = 465;
        $this->mail->isHTML(true);
    }

    function register_mail($recipientAdress, $recipientName, $token): bool
    {
        $this->mail->addAddress($recipientAdress, $recipientName);
        $this->mail->Subject = ("Bienvenue chez Cookr");

        $this->mail->Body = ('
        <body>
        <div>
            <h1>Bienvenue chez Cookr</h1>
        </div>
        <div>
            <div>
                <p>Nous n\'avons toujours pas slogan mais vous trouverez les
                    meilleurs recettes et articles culinaires chez
                    Cookr.</p><br>
                <p>Convaincu(e) ? Super !</p><br>
                <p>Validez votre compte en cliquant sur le bouton juste ici :</p><br>
                
                <button type="submit" style="font-weight:700; background-color: #FC6E3C; padding: 10px 20px 10px 20px; border: none; border-radius: 8px; font-size: 20px; cursor: pointer; margin-top: 12px;">
                    <a href="http://'.getenv('HTTP_HOST').'/confirm?'.http_build_query(["email" => $recipientAdress, "token" => $token]).'" style="color: white; text-decoration: none;">
                        Je valide mon compte
                    </a>
                </button>
            </div>
        </div>
        <div style="display: flex; justify-content: center;">
            <p style="color: grey;">Ceci est un message automatique, merci de ne pas répondre.</p>
        </div>
    </body>
        ');
        
        if (!$this->mail->send()) {
            return false;
        } else {
            return true;
        }
    }
}
