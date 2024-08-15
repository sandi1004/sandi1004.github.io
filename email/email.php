<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require_once '../modelo/daousuario.php';
$objuser=new daoUsuario();
require 'vendor/autoload.php';
$ema=$_GET["cor"];
$mail = new PHPMailer(true);
$regu=$objuser->busUserEmail($ema);
try {
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'rodrigosixtofaustino@gmail.com';
    $mail->Password = 'ftts leac xdud ofdv';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->setFrom('rodrigosixtofaustino@gmail.com', 'Personal Administrador');
    $mail->addAddress($regu["usuario"],$regu["nombre"]);
   // $mail->addCC('armenzu12@gmail.com');

    //$mail->addAttachment('../multimedia/imagenes/tienda.jpg','tienda.jpg');

    $mail->isHTML(true);
    $mail->Subject = 'Password Recuperado';
    $mail->Body = 'Hola, <br/>Tu Contraseña es el siguiente: <br/> Usuario: <b>'.$regu["usuario"].'</b><br/> Password: <b>'.$regu["clave"].'</b>.';
    $mail->send();

    header("location:../Ingresar.php");
} catch (Exception $e) {
    echo 'Mensaje ' . $mail->ErrorInfo;
}