<div class="content-wrapper">
	
	<section class="content-header">
		
		<h1>Universidad Tecnológica del Sur del Estado de México</h1>

	</section>

	<section class="content">
		
		<div class="box">
			
			<div class="box-body">

				<?php

				$inicio = InicioC::VerInicioC();

				if($_SESSION["rol"] == "Administrador"){

					echo '<form method="post">
					
							<textarea name="descripcion" id="editor">
								
								'.$inicio["descripcion"].'

							</textarea>

							<button type="submit" class="btn btn-success pull-right"><i class="fa fa-check"></i></button>

						</form>';

						$descripcion = new InicioC();
						$descripcion -> GuardarDescripcionC();

				}else{

					echo '<p>'.$inicio["descripcion"].'</p>';

				}

					

				?>

				<br>

				<h1>Carreras:</h1>

				<div class="row">

					<?php

						$resultado = CarrerasC::VerCarrerasC();

						foreach ($resultado as $key => $value) {

							$car = explode(" ", $value["nombre"]);

							if($car[0] == "Ingeniería"){

								echo '<div class="col-lg-4 col-xs-6">
						
									<div class="small-box bg-red">
										
										<div class="inner">
											
											<h3>Ingeniería</h3>

											<p>'.$value["nombre"].'</p>

										</div>

										<div class="icon">
											<i class="fa fa-cogs"></i>
										</div>

									</div>

								</div>';

							}else if($car[0] == "Licenciatura"){

								echo '<div class="col-lg-4 col-xs-6">
						
									<div class="small-box bg-blue">
										
										<div class="inner">
											
											<h3>Licenciatura</h3>

											<p>'.$value["nombre"].'</p>

										</div>

										<div class="icon">
											<i class="fa fa-briefcase"></i>
										</div>

									</div>

								</div>';

							}else{

								echo '<div class="col-lg-4 col-xs-6">
						
									<div class="small-box bg-green">
										
										<div class="inner">
											
											<h3>'.$car[0].'</h3>

											<p>'.$value["nombre"].'</p>

										</div>

										<div class="icon">
											<i class="fa fa-laptop"></i>
										</div>

									</div>

								</div>';

							}
							
							

						}

					?>

				</div>

				<?php

					if($_SESSION["rol"] == "Administrador"){

						echo '<h1>Manuales de Uso:</h1>


						<div class="col-lg-4">
							
							<h2>Manual para Profesores</h2>

								<a href="http://localhost/Aulas/'.$inicio["manualProfesor"].'" target="_blank">
								
										<h3>Ver Manual</h3>

									</a>


									<form method="post" enctype="multipart/form-data">
									
										<input type="file" name="manualProfesorN">

										<input type="hidden" name="manualProfesor" value="'.$inicio["manualProfesor"].'">

										<br>

										<button type="submit" class="btn btn-success btn-xs">Guardar</button>

									</form>';

									$manualProfesor = new InicioC();
									$manualProfesor -> GuardarManualProfesorC();


								

							echo '</div>


							<div class="col-lg-4">
								
								<h2>Manual para Estudiantes</h2>

									<a href="http://localhost/Aulas/'.$inicio["manualEstudiante"].'" target="_blank">
									
										<h3>Ver Manual</h3>

									</a>


									<form method="post" enctype="multipart/form-data">
									
										<input type="file" name="manualEstudianteN">

										<input type="hidden" name="manualEstudiante" value="'.$inicio["manualEstudiante"].'">

										<br>

										<button type="submit" class="btn btn-success btn-xs">Guardar</button>

									</form>';


									$manualEstudiante = new InicioC();
									$manualEstudiante -> GuardarManualEstudianteC();

								

							echo '</div>';

					}else if($_SESSION["rol"] == "Profesor"){

						echo '<h1>Manual de Uso:</h1>


						<div class="col-lg-4">
							
								<a href="http://localhost/Aulas/'.$inicio["manualProfesor"].'" target="_blank">
								
									<h3>Ver Manual</h3>

								</a>

						</div>';

					}else{

						echo '<h1>Manual de Uso:</h1>


						<div class="col-lg-4">
							
								<a href="http://localhost/Aulas/'.$inicio["manualEstudiante"].'" target="_blank">
								
									<h3>Ver Manual</h3>

								</a>

						</div>';

					}

				?>

				


				
			</div>

		</div>

	</section>

</div>