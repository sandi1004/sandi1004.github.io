<?php

require_once "../Controladores/aulasC.php";
require_once "../Modelos/aulasM.php";

class AulasA{

	public $Soid;

	public function CrearAulaS(){

		$columna = "id";
		$valor = $this->Soid;

		$resultado = AulasC::VerSC($columna, $valor);

		echo json_encode($resultado);

	}

}

if(isset($_POST["Soid"])){

	$a = new AulasA();
	$a -> Soid = $_POST["Soid"];
	$a -> CrearAulaS();

}