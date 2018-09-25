<?php

require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$to = $_POST['to'];
$object = $_POST['object'];
$developpementMode = FALSE;
$mailer = new PHPMailer($developpementMode);
try{
    $mailer->isSMTP();
    //the mail server smtp address that you use: EX: google
    $mailer->Host = 'smtp.gmail.com';
    $mailer->SMTPAuth = true;
    //adress mail of your account
    $mailer->Username = 'your adress mail';
    //password of your mail account
    $mailer->Password = 'your password';
    $mailer->SMTPSecure = 'tls';
    $mailer->Port = 587;
    //your adress mail
    $mailer->setFrom('your adress mail');
    $mailer->addAddress($to);
    $mailer->isHTML(true);
    $mailer->Subject = "send mail usign php";
    $mailer->Body = "<h1 style='color: red'>$object</h1>";
    $mailer->send();
    $mailer->clearAllRecipients();
    echo 'true';
    
} catch (Exception $ex) {
    echo 'false';
}