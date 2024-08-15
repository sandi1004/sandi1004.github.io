<?php

class CarrerasC{

	public static function CrearCarreraC(){

		if(isset($_POST["carrera"])){

			$tablaBD = "carreras";

			$carrera = $_POST["carrera"];

			$resultado = CarrerasM::CrearCarreraM($tablaBD, $carrera);

			if($resultado == true){

				echo '<script>

					swal({

						type: "success",
						title: "La Carrera se ha Creado Correctamente",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

						}).then(function(resultado){

							if(resultado.value){

								window.location = "http://localhost/Aulas/Carreras";

							}

						})

					
				</script>';

			}

		}

	}


	public static function VerCarrerasC(){

		$tablaBD = "carreras";

		$resultado = CarrerasM::VerCarrerasM($tablaBD);

		return $resultado;

	}



	public static function EditarCarreraC(){

		$tablaBD = "carreras";

		$exp = explode("/", $_GET["url"]);

		$id = $exp[1];

		$resultado = CarrerasM::EditarCarreraM($tablaBD, $id);

		echo '<div class="col-md-6 col-xs-12">
						
				<h2>Nombre de la Carrera:</h2>
				<input type="text" class="form-control input-lg" name="nombreE" value="'.$resultado["nombre"].'" required="">

				<input type="hidden" name="Cid" value="'.$resultado["id"].'"">

				<br>
				<button type="submit" class="btn btn-success">Guardar Cambios</button>

			</div>';

	}



	public static function ActualizarCarreraC(){

		if(isset($_POST["Cid"])){

			$tablaBD = "carreras";

			$datosC = array("id"=>$_POST["Cid"], "carrera"=>$_POST["nombreE"]);

			$resultado = CarrerasM::ActualizarCarreraM($tablaBD, $datosC);

			if($resultado == true){

				echo '<script>

					swal({

						type: "success",
						title: "La Carrera se ha Actualizado Correctamente",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

						}).then(function(resultado){

							if(resultado.value){

								window.location = "http://localhost/Aulas/Carreras";

							}

						})

					
				</script>';

			}

		}

	}


	public static function BorrarCarreraC(){

		$exp = explode("/", $_GET["url"]);

		$id = $exp[1];

		if(isset($id)){

			$tablaBD = "carreras";

			$resultado = CarrerasM::BorrarCarreraM($tablaBD, $id);

			if($resultado == true){

				echo '<script>

					window.location = "http://localhost/Aulas/Carreras";
				</script>';

			}

		}

	}


}