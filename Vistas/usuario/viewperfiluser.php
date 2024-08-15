<div class="container" style="background-image: url('https://img.freepik.com/vector-gratis/fondo-abstracto-blanco_23-2148817572.jpg'); ">
    <center> <h1 style="background-image: url('https://cdn.wallpapersafari.com/37/58/OQKYNM.jpg'); margin-top: 3%; border-radius: 20px">Editar Usuarios </h1></center>
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" >
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a href="../vistas/principal.php">Inicio</a></li> 
            <li class="breadcrumb-item active " aria-current="page" href="../controlador/usuariocontroller.php?accion=busper&idu">Perfil</li>
        </ol>
        <div class="alert alert-dismissible alert-danger">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong>Cuidado!!</strong> <a href="#" class="alert-link"> Verifica los cambios antes de Guardar </a> ya que se veran en la tabla.
        </div>
    </nav>
    <hr/>
    <form action="usuariocontroller.php" method="post">
        <div class="mb-3 mt-3">
            <input type="hidden" name="accion" value="updper"/>
            <label for="email" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="email" placeholder="Introduce Nombre" name="txtnom" value="<?= $user["nombre"] ?>">
        </div>
        <div class="mb-3 mt-3">
            <label for="email" class="form-label">Tipo Documento</label>
            <input type="text" class="form-control" id="email" placeholder="Introduce Tipo Documento" name="txttd" value="<?= $user["tipo_documento"] ?>">
        </div>
        <div class="mb-3 mt-3">
            <label for="email" class="form-label">Numero Documento</label>
            <input type="text" class="form-control" id="email" placeholder="Introduce Numero de Documento" name="txtnd" value="<?= $user["num_documento"] ?>">
        </div>
        <div class="mb-3 mt-3">
            <label for="email" class="form-label">Dirección</label>
            <input type="text" class="form-control" id="email" placeholder="Introduce Dirección" name="txtdir" value="<?= $user["direccion"] ?>">
        </div>
        <div class="mb-3 mt-3">
            <label for="email" class="form-label">Telefono</label>
            <input type="text" class="form-control" id="email" placeholder="Introduce Telefono" name="txttel" value="<?= $user["telefono"] ?>">
        </div>
        <div class="mb-3 mt-3">
            <label for="email" class="form-label">E- Mail</label>
            <input type="text" class="form-control" id="email" placeholder="Introduce E-mail" name="txte" value="<?= $user["email"] ?>">
        </div>
        <div class="mb-3 mt-3">
            <label for="clave" class="form-label">Clave</label>
            <input type="password" class="form-control" id="clave"   name="txtcve" value="<?= $user["clave"] ?>" required="">
        </div>            

        <div class="mb-3">
            <label for="pwd" class="form-label">Estado</label>

            <select name="cmbes" class="form-control">
                <option value="1" >1-Activado</option>
            </select>
        </div> 

        <input type="hidden" name="txtidu" value="<?= $user["idusuario"] ?>"/>

        <div class="d-grid gap-2">
            <button class="btn btn-lg btn-primary" type="submit" >Guardar</button>
            <a href="../controlador/usuariocontroller.php?accion=lst"><img src="../multimedia/imagenes/boton-regresar-1.png" height="50" width="150" alt="Botón"></a>
        </div> 
    </form>
    <hr/>

