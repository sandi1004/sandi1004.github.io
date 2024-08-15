
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once '../modelo/daousuario.php';
$objuser = new daoUsuario();
require_once '../modelo/daoPersona.php';
require_once '../modelo/daoventa.php';
require_once '../modelo/daoArticulo.php';
require_once '../modelo/daoUsuario.php';
$objven = new daoventa();
$objper = new daoPersona();
$obja = new daoArticulo();
$obju = new daoUsuario();
require 'vendor/autoload.php';
$idv = $_GET["idven"];
$mail = new PHPMailer(true);



$nventa = $objven->busVenta($idv);
$nventa["nombrec"] = $objper->nombreCliente($nventa["idcliente"]);
$nventa["userven"] = $obju->nombreUser($nventa["idusuario"]);
$user=$obju->busUser($nventa["idusuario"]);
$cli=$objper->busPersona($nventa["idcliente"]);
$lisproventa = $objven->listaProductosVenta($idv);

$cuerpo ='<table class="table table-borderless">';
$cuerpo = $cuerpo . '<tr>';
$cuerpo = $cuerpo . '<td>';
$cuerpo = $cuerpo . '<label for="email" class="form-label fw-bold">Venta: </label>   <span class="fw-bold text-success">'.$nventa["idventa"].'</span>';
$cuerpo = $cuerpo . '</td>';
$cuerpo = $cuerpo . '<td>';
$cuerpo = $cuerpo . '<label for="email" class="form-label fw-bold">Fecha: </label>   <span class="fw-bold text-success">'.$nventa["fecha"].'</span>';
$cuerpo = $cuerpo . '</td>';
$cuerpo = $cuerpo . '<td>';
$cuerpo = $cuerpo . '<label for = "email" class = "form-label fw-bold">Cliente: </label> <span class = "fw-bold text-success">'.$nventa["nombrec"].'</span>';
$cuerpo = $cuerpo . '</td>';
$cuerpo = $cuerpo . '</tr>';
$cuerpo = $cuerpo . '<tr>';
$cuerpo = $cuerpo . '<td>';
$cuerpo = $cuerpo . '<label for="email" class="form-label fw-bold">Tipo Comprobante: </label>  <span class="fw-bold text-success">'. $nventa["tipo_comprobante"].'</span>';
$cuerpo = $cuerpo . '</td>';
$cuerpo = $cuerpo . '<td>';
$cuerpo = $cuerpo . '<label for="email" class="form-label fw-bold">Serie Comprobante: </label>  <span class="fw-bold text-success">'. $nventa["serie_comprobante"] .'</span>';
$cuerpo = $cuerpo . '</td>';
$cuerpo = $cuerpo . '<td>';
$cuerpo = $cuerpo . '<label for="email" class="form-label fw-bold">Numero Comprobante: </label>  <span class="fw-bold text-success">'. $nventa["num_comprobante"] .'</span>';
$cuerpo = $cuerpo . '</td>';
$cuerpo = $cuerpo . '</tr>';
$cuerpo = $cuerpo . '<tr>';
$cuerpo = $cuerpo . '<td>';
$cuerpo = $cuerpo . '<label for="email" class="form-label fw-bold">Subtotal: </label>  <span class="fw-bold text-success">'. $nventa["total"] .'</span>';
$cuerpo = $cuerpo . '</td>';
$cuerpo = $cuerpo . '<td>';
$cuerpo = $cuerpo . '<label for="email" class="form-label fw-bold">IVA: </label>  <span class="fw-bold text-success">'. $nventa["impuesto"] .'</span>';
$cuerpo = $cuerpo . '</td>';
$cuerpo = $cuerpo . '<td>';
$cuerpo = $cuerpo . '<label for="email" class="form-label fw-bold">Total: </label>  <span class="fw-bold text-success">'.($nventa["impuesto"]+$nventa["total"]).'/span>';
$cuerpo = $cuerpo . '</td>';
$cuerpo = $cuerpo . '</tr>';
$cuerpo = $cuerpo . '<tr>';
$cuerpo = $cuerpo . '<td>';
$cuerpo = $cuerpo . '<label for="email" class="form-label fw-bold">Vendido: </label>  <span class="fw-bold text-success">'. $nventa["userven"] .'</span>';
$cuerpo = $cuerpo . '</td>';
$cuerpo = $cuerpo . '</tr>';
$cuerpo = $cuerpo . '<tr>';
$cuerpo = $cuerpo . '<td>';
$cuerpo = $cuerpo . '<a href="ventacontroller.php?accion=lst" class="btn btn-primary"><i class="bi bi-arrow-bar-left"></i>  Regresar</a>';
$cuerpo = $cuerpo . '</td>';
$cuerpo = $cuerpo . '</tr>';

$cuerpo = $cuerpo . '</table>';
$cuerpo = $cuerpo . '<hr/>';
$cuerpo = $cuerpo . '<h3 >Lista Productos </h3>';
$cuerpo = $cuerpo . '<table class="table  table-hover table-secondary " style="margin-top: 3%;">';
$cuerpo = $cuerpo . '<tr class="table-dark">';
$cuerpo = $cuerpo . ' $cuerpo=$cuerpo.<td>Cantidad</td>';
$cuerpo = $cuerpo . '<td>Nombre del Producto</td>';
$cuerpo = $cuerpo . '<td>Precio X Unidad</td>';
$cuerpo = $cuerpo . '<td>Subtotal</td>';
$cuerpo = $cuerpo . '</tr>';

if ($lisproventa != null) {

    foreach ($lisproventa as $pro) {
        $cuerpo = $cuerpo . "<tr >";
        $cuerpo = $cuerpo . "<td>" . $pro["cantidad"] . "</td>";
        $cuerpo = $cuerpo . "<td>" . $pro["nombre"] . "</td>";
        $cuerpo = $cuerpo . "<td>" . $pro["precio"] . "</td>";
        $cuerpo = $cuerpo . "<td>" . $pro["subtotal"] . "</td>";
        $cuerpo = $cuerpo . "</tr>";

        try {
//$mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'rodrigosixtofaustino@gmail.com';
            $mail->Password = 'ftts leac xdud ofdv';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom($user["email"], 'Cajero Mostrador');
            $mail->addAddress($cli["email"], $cli["nombre"]);
// $mail->addCC('armenzu12@gmail.com');
$mail->addAttachment('../multimedia/imagenes/farmaciacorreo.jpg','farmaciacorreo.jpg');

            $mail->isHTML(true);
            $mail->Subject = 'Realizada Compra';
            $mail->Body =$cuerpo;
            $mail->send();
            echo "Correo Enviado";
            header("location:../controlador/ventacontroller.php?accion=lst");
        } catch (Exception $e) {
            echo 'Mensaje ' . $mail->ErrorInfo;
        }
    }
}
$cuerpo = $cuerpo . '</table>';
