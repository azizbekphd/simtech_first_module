<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
require './config.php';

function send_mail(
    string $to,
    string $subject,
    string $body,
) {
    $mail = new PHPMailer;
    $mail->CharSet = 'UTF-8';
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPDebug = 0;
    $mail->Host = 'ssl://smtp.gmail.com';
    $mail->Port = 465;
    $mail->Username = $GLOBALS["admin"]["mail"];
    $mail->Password = $GLOBALS["admin"]["password"];
    $mail->setFrom($GLOBALS["admin"]["mail"]);
    $mail->addAddress($to);
    $mail->Subject = $subject;
    $body = $body;
    $mail->msgHTML($body);
    $mail->SMTPOptions = array(
    	'ssl' => array(
    		'verify_peer' => false,
    		'verify_peer_name' => false,
    		'allow_self_signed' => true
    	)
    );
    $mail->send();
}
