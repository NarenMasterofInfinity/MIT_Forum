<?php

#===================================#
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require "vendor/autoload.php";
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';
require 'vendor/phpmailer/phpmailer/src/Exception.php';
#====================================#

function sendOTP($email, $otp)
{
    $mail = new PHPMailer(true);

    try {


        $to = $email;
        $from = "mitforum2023@gmail.com";
        $subject = "One Time Password from MIT Forum Admin";
        $body = "OTP for your current session is $otp. It is valid only for 15 minutes.<h3>Don't share it with anyone!</h3>";

        //SMTP stuffs
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = $from;
        $mail->Password = 'lsgokczgeyzijzgc';
        $mail->SMTPSecure = 'ssl';  //ssl --> tls
        $mail->Port = 465; //->can also use 587


        $mail->setFrom($from, 'MIT Forum Admin');
        $mail->addAddress($to);
        $mail->Subject = $subject;
        $mail->isHTML(true);
        $mail->msgHTML($body);
        $status = $mail->send();
        //echo "mail is sent";
        return 1;
    } catch (Exception $e) {
        return $e->errorMessage();
    }
}
