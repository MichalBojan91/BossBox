<?php
declare(strict_types=1);

namespace App;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use App\Exception\AppException;

require_once("PHPMailer/src/PHPMailer.php");
require_once("PHPMailer/src/Exception.php");
require_once("PHPMailer/src/SMTP.php");

class SendMail
{
    public function SendMail(array $mailData): void
    {
        $mail = new PHPMailer(true);

        try {
            //Server settings
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'bossbox0125@gmail.com';                     //SMTP username
            $mail->Password   = 'ogqc imkq eoxt xybt';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;  
            $mail->CharSet = 'UTF-8';                                  
        
            //Recipients
            $mail->setFrom($mail->Username, 'BossBox');
            $mail->addAddress($mailData['email'], $mailData['recipment']);     //Add a recipient
        
            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
        
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $mailData['subject'];
            $mail->Body    = $mailData['body'];
            $mail->AltBody = $mailData['body'];
        
            $mail->send();
            } catch (AppException $e) {
            echo "Wiadomość nie mogła zostać wysłana, skontaktuj się z administratorem";
        }
    }    
    }        