<?php

class MensajesC{


	 public static function EnviarMensajeC(){

		if(isset($_POST["id_destinatario"])){

			$tablaBD = "mensajes";

			$datosC = array("id_destinatario" => $_POST["id_destinatario"], "id_envia" => $_POST["id_envia"], "asunto" => $_POST["asunto"], "mensaje" => $_POST["mensaje"], "leido" => "No");

			$resultado = MensajesM::EnviarMensajeM($tablaBD, $datosC);

			if($resultado == true){

				$resultado2 = MensajesM::VerUltimoId($tablaBD);

				echo '<script>

					swal({

						type: "success",
						title: "El Mensaje se ha Enviado Correctamente",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

						}).then(function(resultado){

							if(resultado.value){

								window.location = "http://localhost/Aulas/Mensaje/'.$resultado2["id"].'";

							}

						})

					
				</script>';

			}

		}

	}



	 public static function VerMensajesC($columna, $valor){

		$tablaBD = "mensajes";

		$resultado = MensajesM::VerMensajesM($tablaBD, $columna, $valor);

		return $resultado;

	}


	 public static function SinLeerC($columna, $valor){

		$tablaBD = "mensajes";

		$resultado = MensajesM::SinLeerM($tablaBD, $columna, $valor);

		return $resultado;

	}


	public static function LeerMensajeC(){

		if(isset($_POST["idM"])){

			$tablaBD = "mensajes";

			$datosC = array("id"=>$_POST["idM"], "fecha"=>$_POST["fecha"], "leido"=>"Si");

			$resultado = MensajesM::LeerMensajeM($tablaBD, $datosC);

			if($resultado == true){

				echo '<script>


						window.location = "http://localhost/Aulas/Mensaje/'.$_POST["idM"].'";

					
				</script>';

			}

		}

	}


}