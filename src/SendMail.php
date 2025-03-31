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
    public function SendMail(array $mailData, $invoicePdf=null, $invoiceNumber=null): void
    {
        $mail = new PHPMailer(true);

        try {
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
            $mail->addAddress($mailData['email'], $mailData['recipment']??null);     //Add a recipient
        
           
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $mailData['subject'];
            $mail->Body    = nl2br(htmlspecialchars($mailData['body']));;
            
            if($invoicePdf){
                // Dodanie PDF jako załącznika
            $mail->addStringAttachment($invoicePdf, "Faktura_$invoiceNumber.pdf", 'base64', 'application/pdf');
            }
                   
        
            $mail->send();
            } catch (AppException $e) {
            echo "Wiadomość nie mogła zostać wysłana, skontaktuj się z administratorem";
        }
    }    
    }        