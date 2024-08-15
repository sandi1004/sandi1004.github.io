<?php

class AulasC{

	public static function CrearAulaC(){

		if(isset($_POST["materia"])){

			$tablaBD = "aulas";

			$exp = explode("/", $_GET["url"]);

			$datosC = array("materia"=>$_POST["materia"], "id_carrera"=>$_POST["id_carrera"], "id_profesor"=>$_POST["id_profesor"]);

			$resultado = AulasM::CrearAulaM($tablaBD, $datosC);

			if($resultado == true){

				echo '<script>

					swal({

						type: "success",
						title: "El Aula se ha Creado Correctamente",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

						}).then(function(resultado){

							if(resultado.value){

								window.location = "http://localhost/Aulas/'.$exp[0].'";

							}

						})

					
				</script>';

			}

		}

	}


	public static function VerAulasC(){

		$tablaBD = "aulas";

		$resultado = AulasM::VerAulasM($tablaBD);

		return $resultado;

	}

	 public static function VerAulas2C($columna, $valor){

		$tablaBD = "aulas";

		$resultado = AulasM::VerAulas2M($tablaBD, $columna, $valor);

		return $resultado;

	}


	public static function BorrarAulaC(){

		if(isset($_GET["Aid"])){

			$tablaBD = "aulas";

			$id = $_GET["Aid"];

			$resultado = AulasM::BorrarAulaM($tablaBD, $id);

			if($resultado == true){

				echo '<script>

					window.location = "Aulas";
				</script>';

			}

		}

	}



	public static function SolicitarAulaC(){

		if(isset($_POST["materia"])){

			$tablaBD = "solicitudes";

			$datosC = array("materia"=>$_POST["materia"], "id_profesor"=>$_POST["id_profesor"], "observaciones"=>$_POST["observaciones"], "estado"=>"Solicitada");

			$resultado = AulasM::SolicitarAulaM($tablaBD, $datosC);

			if($resultado == true){

				echo '<script>

					swal({

						type: "success",
						title: "La Solicitud ha sido Enviada Correctamente",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

						}).then(function(resultado){

							if(resultado.value){

								window.location = "Solicitudes";

							}

						})

					
				</script>';

			}

		}

	}



	public static function VerSolicitudesC(){

		$tablaBD = "solicitudes";

		$resultado = AulasM::VerSolicitudesM($tablaBD);

		return $resultado;

	}

	 public static function VerSC($columna, $valor){

		$tablaBD = "solicitudes";

		$resultado = AulasM::VerSM($tablaBD, $columna, $valor);

		return $resultado;

	}


	public static function ActualizarEstadoSC(){

		if(isset($_POST["id"])){

			$tablaBD = "solicitudes";

			$datosC = array("id"=>$_POST["id"], "estado"=>"Aprobada");

			$resultado = AulasM::ActualizarEstadoSM($tablaBD, $datosC);

		}

	}



}