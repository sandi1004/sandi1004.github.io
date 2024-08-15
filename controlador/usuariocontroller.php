<?php

 
 if(isset($_GET["accion"]))
 {
     require_once '../modelo/dbConexion.php';
     switch($_GET["accion"]){
         case "del":
                 $iduser=$_GET["idu"];
                 $objuser->delUser($iduser);
                    $lista=$objuser->listaUsuario();
                    $lisrol=$objrol->listaRoles();
                    include '../vistas/encabezado.php';
                    include '../vistas/usuario/viewusuarios.php';
                    include '../vistas/pie.php';                 
             break;
         case "busper":
                 $iduser=$_GET["idu"];
                 $user=$objuser->busUser($iduser);
                  include '../vistas/encabezado.php';
                 include '../vistas/usuario/viewperfiluser.php';
                 include '../vistas/pie.php';
               break;  
         case "rescontra":
                     header("location:../Vistas/usuario/viewResContra1.php");
                     break;
         case "acceso":
                      header("location:../Vistas/usuario/viewlogin.php");
                 break; 
         case "logout":
                      session_start();
                      unset($_SESSION["user"]);
                      unset($_SESSION["iduser"]);
                      header("location:../vistas/usuario/viewlogin.php");
               break;
         case "lst":
                    $lista=$objuser->listaUsuario();
                    $lisrol=$objrol->listaRoles();
                    include '../vistas/encabezado.php';
                    include '../vistas/usuario/viewusuarios.php';
                    include '../vistas/pie.php';
                    break;                     
     }
     unset($objuser); 
 }else{
     echo $_POST["accion"];
     require_once '../modelo/daousuario.php';
     $objuser=new daoUsuario();
     switch($_POST["accion"]){
            case "add":
                     $newuser["idrol"]=$_POST["cmbrol"];
                     $newuser["nombre"]=$_POST["txtnom"];
                     $newuser["tipo_documento"]=$_POST["txttd"];
                     $newuser["num_documento"]=$_POST["txtnd"];
                     $newuser["direccion"]=$_POST["txtdir"];
                     $newuser["telefono"]=$_POST["txttel"];
                     $newuser["email"]=$_POST["txte"];
                     $newuser["clave"]=$_POST["txtcve"];
                     $newuser["estado"]=$_POST["cmbes"];
                     $objuser->addUser($newuser);
                    $lista=$objuser->listaUsuario();
                    $lisrol=$objrol->listaRoles();
                    include '../vistas/encabezado.php';
                    include '../vistas/usuario/viewusuarios.php';
                    include '../vistas/pie.php';                             
                break;
            case "login":
                 $user["usuario"]=$_POST["usuario"];
                 $user["password"]=$_POST["clave"];
                 $lo=$objuser->login($user);
                 if($lo==null){
                     header("location:../vistas/error.php");
                 }else{
                     session_start();
                     $_SESSION["user"] = $lo["nombre"];
                     $_SESSION["iduser"] = $lo["idusuario"];
                     header("location:../vistas/principal.php");
                 }
             break;
           case "updper":
              $user["idusuario"]=$_POST["txtidu"];
             $user["nombre"]=$_POST["txtnom"];
             $user["tipo_documento"]=$_POST["txttd"];
             $user["num_documento"]=$_POST["txtnd"];
             $user["direccion"]=$_POST["txtdir"];
             $user["telefono"]=$_POST["txttel"];
             $user["email"]=$_POST["txte"];
             $user["clave"]=$_POST["txtcve"];
             $user["estado"]=$_POST["cmbes"];
             $objuser->ModPerUser($user);
             header("Location:../vistas/principal.php");
               break;
         case "rescontra":
                    $ema=$_POST["txtu"];
                     $res=$objuser->busUserEmail($ema);
                     if($res!=null){
                         header("location:../email/email.php?cor=$ema");
                     }
                     else{
                     header("location:../Vistas/usuario/viewResContra1.php");
                     }
                     break;           
     } 
     unset($objuser);
 }

?>