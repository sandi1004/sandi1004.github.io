<?php

require_once "ConexionBD.php";

class MensajesM extends ConexionBD{

	static public function EnviarMensajeM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD (id_destinatario, id_envia, asunto, mensaje, leido) VALUES (:id_destinatario, :id_envia, :asunto, :mensaje, :leido)");

		$pdo -> bindParam(":id_destinatario", $datosC["id_destinatario"] ,PDO::PARAM_INT);
		$pdo -> bindParam(":id_envia", $datosC["id_envia"] ,PDO::PARAM_INT);
		$pdo -> bindParam(":asunto", $datosC["asunto"] ,PDO::PARAM_STR);
		$pdo -> bindParam(":mensaje", $datosC["mensaje"] ,PDO::PARAM_STR);
		$pdo -> bindParam(":leido", $datosC["leido"] ,PDO::PARAM_STR);

		if($pdo -> execute()){
			return true;
		}

		$pdo -> close();
		$pdo = null;

	}


	static public function VerUltimoId($tablaBD){

		$pdo = ConexionBD::cBD()->prepare("SELECT MAX(id) AS id FROM $tablaBD");

		$pdo -> execute();

		return $pdo -> fetch();

		$pdo -> close();
		$pdo = null;

	}


	static public function VerMensajesM($tablaBD, $columna, $valor){

		if($columna == null){

			$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD ORDER BY fecha DESC");

			$pdo -> execute();

			return $pdo -> fetchAll();
		
		}else{

			$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");

			$pdo -> bindParam(":".$columna, $valor ,PDO::PARAM_INT);

			$pdo -> execute();

			return $pdo -> fetch();

		}

		$pdo -> close();
		$pdo = null;


	}



	static public function SinLeerM($tablaBD, $columna, $valor){

		$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");

			$pdo -> bindParam(":".$columna, $valor ,PDO::PARAM_INT);

		$pdo -> execute();

		return $pdo -> fetchAll();

		$pdo -> close();
		$pdo = null;

	}


	static public function LeerMensajeM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET leido = :leido, fecha = :fecha WHERE id = :id");

		$pdo -> bindParam(":leido", $datosC["leido"], PDO::PARAM_STR);
		$pdo -> bindParam(":fecha", $datosC["fecha"], PDO::PARAM_STR);
		$pdo -> bindParam(":id", $datosC["id"], PDO::PARAM_STR);

		if($pdo -> execute()){
			return true;
		}

		$pdo -> close();
		$pdo = null;

	}


}