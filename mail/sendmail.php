<?php

require("PHPMailer/src/PHPMailer.php");
require("PHPMailer/src/Exception.php");
require("PHPMailer/src/SMTP.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Mailer
{

    public function dathangmail($tieude, $noidung, $maildathang)
    {
        // print_r($mail);
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = 0;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'newlookfashion009@gmail.com';                 // SMTP username
            $mail->Password = 'flnzojmwtffpobii';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom('newlookfashion009@gmail.com', 'Mailer');

            $mail->addAddress($maildathang);     // Add a recipient
            // $mail->addAddress('nqnhatdz008@gmail.com', 'Quang Nhat');               // Name is optional

            // $mail->addReplyTo('info@example.com', 'Information');
            $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');            // Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');       // Optional name

            //Content
            $mail->isHTML(true);                                    // Set email format to HTML
            $mail->Subject = $tieude;
            $mail->Body    = $noidung;
            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
    }
}
?>