<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
use Source\Controller\Email;

require_once("../../vendor/autoload.php");
require '../../source/Controller/src/Exception.php';
require '../../source/Controller/src/PHPMailer.php';
require '../../source/Controller/src/SMTP.php';

if (isset($_POST["emails"]) && isset($_POST["funcionario"])) {
    $mail = new PHPMailer(true);
    try {
        foreach (Email::PegaEmail($_POST["emails"]) as $value2) {
            $mail->AddAddress($value2);
        }
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->SMTPDebug  = 0;
        $mail->CharSet = 'UTF-8';
        $mail->isSMTP();
        $mail->SMTPSecure = "tls";
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        $mail->SMTPAuth = true;
        $mail->Username = 'sistemafcalendar@gmail.com';
        $mail->Password = 'SyScalendar';
        $mail->Port = 587;
        $mail->setFrom('sistemafcalendar@gmail.com');
        $mail->isHTML(true);
        $mail->Subject = ($_POST["funcionario"] . ', convidou você!');
        $email_template = 'email_template.html';
        $mail->Body = file_get_contents($email_template);
        $mail->AltBody = ($_POST["funcionario"] . ', convidou você para ir ao escritório');

        if ($mail->send()) {
            echo 'Email enviado com sucesso';
        } else {
            echo 'Email nao enviado';
        }
    } catch (Exception $e) {
        echo "Erro ao enviar mensagem: {$mail->ErrorInfo}";
    }
}
