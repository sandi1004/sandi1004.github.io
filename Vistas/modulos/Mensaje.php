<?php

$exp = explode("/", $_GET["url"]);

$columna = "id";

$valor = $exp[1];
$mensaje = MensajesC::VerMensajesC($columna, $valor);

$valor = $mensaje["id_destinatario"];
$Destinatario = UsuariosC::VerUsuariosC($columna, $valor);

$valor = $mensaje["id_envia"];
$Envia = UsuariosC::VerUsuariosC($columna, $valor);

if($_SESSION["id"] != $mensaje["id_destinatario"] && $_SESSION["id"] != $mensaje["id_envia"]){

	echo '<script>

		window.location = "http://localhost/Aulas/Mensajes";

	</script>';

}

?>

<div class="content-wrapper">
	
	<section class="content-header">
		
		<a href="http://localhost/Aulas/Mensajes">
			
			<button class="btn btn-primary">Ir a Mensajes</button>

		</a>

	</section>

	<section class="content">
		
		<div class="box">
			
			<div class="box-body">

				<?php
				

					echo '<h2>Para: <b>'.$Destinatario["apellido"].' '.$Destinatario["nombre"].'</b></h2>

							<h2>De: <b>'.$Envia["apellido"].' '.$Envia["nombre"].'</b></h2>

							<h2>Asunto: <b>'.$mensaje["asunto"].'</b></h2>

							<h2>Mensaje: '.$mensaje["mensaje"].' </h2>

							<br>';

							if($Destinatario["id"] == $_SESSION["id"]){

								echo '<a href="http://localhost/Aulas/Enviar-Mensaje/'.$Envia["id"].'">
								
										<button class="btn btn-primary">Responder Mensaje</button>

									</a>';

							}
							


				?>
				
				
			</div>

		</div>

	</section>

</div>