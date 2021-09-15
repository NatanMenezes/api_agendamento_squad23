<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
use Source\Controller\Email;

require_once("../../vendor/autoload.php");
require '../../source/Controller/src/Exception.php';
require '../../source/Controller/src/PHPMailer.php';
require '../../source/Controller/src/SMTP.php';
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Credentials: true");
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');

$email_template = file_get_contents('email_template.php');

if (isset($_POST["emails"]) && isset($_POST["funcionario"]) && isset($_POST["data"]) && isset($_POST['turno'])) {
    $mail = new PHPMailer(true);
    // Substitui o % pela informação
    $email_template = str_replace('%funcionario%', $_POST["funcionario"], $email_template);
    //$email_template = str_replace('%consultor%', $_POST["consultor"], $email_template);
    $email_template = str_replace('%data%', $_POST["data"], $email_template);
    $email_template = str_replace('%turno%', $_POST["turno"], $email_template);
    try {
        foreach (Email::PegaEmail($_POST["emails"]) as $value2) {
            $mail->AddAddress($value2);
        }
        $funcionario = $_POST["funcionario"];
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
        $mail->Subject = ("FCalendar: " . $funcionario . " convidou você");
        $mail->Body = ($email_template);
        $mail->AltBody = ($funcionario . 'convidou você para ir ao escritório');

        if ($mail->send()) {
            echo 'Email enviado com sucesso';
        } else {
            echo 'Email nao enviado';
        }
    } catch (Exception $e) {
        echo "Erro ao enviar mensagem: {$mail->ErrorInfo}";
    }
}
