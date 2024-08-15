<div class="container" style="background-image: url('https://st2.depositphotos.com/1888461/11609/i/950/depositphotos_116096020-stock-illustration-light-gray-background-with-soft.jpg');">
    <center> <h1 style= "background-image: url('https://cdn.wallpapersafari.com/37/58/OQKYNM.jpg'); margin-top: 3%; border-radius: 20px">U S U A R I O S</h1></center>
   
  <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" >
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a href="../vistas/principal.php">Inicio</a></li> 
            <li class="breadcrumb-item active " aria-current="page">Usuarios</li>
        </ol>
    </nav>
    <hr/>
    <form action="usuariocontroller.php" method="post">
        <div class="mb-3 mt-3">
            <input type="hidden" name="accion" value="add"/>
            <label for="email" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="email" placeholder="Introduce Nombre" name="txtnom">
        </div>
        <div class="mb-3 mt-3">
            <label for="email" class="form-label">Tipo Documento</label>
            <input type="text" class="form-control" id="email" placeholder="Introduce Tipo Documento" name="txttd">
        </div>
        <div class="mb-3 mt-3">
            <label for="email" class="form-label">Numero Documento</label>
            <input type="text" class="form-control" id="email" placeholder="Introduce Numero de Documento" name="txtnd">
        </div>
        <div class="mb-3 mt-3">
            <label for="email" class="form-label">Dirección</label>
            <input type="text" class="form-control" id="email" placeholder="Introduce Dirección" name="txtdir">
        </div>
        <div class="mb-3 mt-3">
            <label for="email" class="form-label">Telefono</label>
            <input type="text" class="form-control" id="email" placeholder="Introduce Telefono" name="txttel">
        </div>
        <div class="mb-3 mt-3">
            <label for="email" class="form-label">E- Mail</label>
            <input type="text" class="form-control" id="email" placeholder="Introduce E-mail" name="txte">
        </div>
        <div class="mb-3 mt-3">
            <label for="email" class="form-label">Clave</label>
            <input type="password" class="form-control" id="email" placeholder="Introduce Clave" name="txtcve">
        </div>            

        <div class="mb-3">
            <label for="pwd" class="form-label">Estado</label>

            <select name="cmbes" class="form-control">
                <option value="0">0-Desactivado</option>
                <option value="1" selected>1-Activado</option>
            </select>
        </div> 
        <div class="mb-3">
            <label for="pwd" class="form-label">Rol</label>

            <select name="cmbrol" class="form-control">
                <?php
                if ($lisrol != null) {
                    foreach ($lisrol as $rol) {
                        ?>
                        <option value="<?= $rol["idrol"] ?>"><?= $rol["nombre"] ?></option>
                    <?php }
                } ?>
            </select>
        </div>  

        <div class="d-grid gap-2">
            <button class="btn btn-lg btn-primary" type="submit" onclick="myFunction()">Guardar</button>
        </div>
        <figure class="text-center">
            <blockquote class="blockquote">
                <p class="mb-0">A continuación se muestran los Usuarios existentes en este punto de venta.</p>

            </blockquote>
            <figcaption class="blockquote-footer">
                Solo el Administrador puede - <cite title="Source Title"> Editar y Eliminar </cite>
            </figcaption>
        </figure>
    </form>
     <div style="background-image: url('https://s3.amazonaws.com/cdn.wp.m4ecmx/wp-content/uploads/2021/04/12230734/nueva-portada-enero-1-1.jpg'); ">
   
    <hr/>
    <div class="mx-auto overflow-auto">
        <table class="table table-secondary  table-hover table-primary"  style="margin-top: 3%;">
            <tr class='table-dark'>
                <td style="text-align: center">Id usuario</td>
                <td style="text-align: center">Rol</td>
                <td style="text-align: center">Nombre</td>
                <td style="text-align: center">Tipo </td>
                <td style="text-align: center">Numero </td>
                <td style="text-align: center">Direccion </td>
                <td style="text-align: center">Telefono </td>
                <td style="text-align: center">Email </td>
                <td style="text-align: center">Clave </td>
                <td style="text-align: center">Acciones </td>
            </tr>    
            <?php
            if ($lista != null) {

                foreach ($lista as $cate) {
                    echo "<tr >";
                    echo '<td style="text-align: center">' . $cate["idusuario"] . "</td>";
                    echo '<td style="text-align: center">' . $cate["nom"] . "</td>";
                    echo '<td style="text-align: center">' . $cate["nombre"] . "</td>";
                    echo '<td style="text-align: center">' . $cate["tipo_documento"] . "</td>";
                    echo '<td style="text-align: center">' . $cate["num_documento"] . "</td>";
                    echo '<td style="text-align: center">' . $cate["direccion"] . "</td>";
                    echo '<td style="text-align: center">' . $cate["telefono"] . "</td>";
                    echo '<td style="text-align: center">' . $cate["email"] . "</td>";
                    echo '<td style="text-align: center">' . $cate["esta"] . "</td>";
                    
                    echo "<td>" //<a class='btn m-1 btn-success'>Lista Usuarios</a>";
                    . "<a>  </a>"
                    . "<a class='btn btn-outline-warning' href='usuariocontroller.php?accion=busper&idu=" . $cate["idusuario"] . "'>Editar</a>"
                    . "<a>  </a>"
                    . "<a href='usuariocontroller.php?accion=del&idu=" . $cate["idusuario"] . "' class='btn btn-outline-danger'>Eliminar</a></center></td>";
                     
                }
            }
            ?>
        </table>
        <hr/>

 <div class="row mt-5">
        <div class="col">
            <div class="card border-info mb-3" style="max-width: 20rem;">
                <div class="card-header">Farmacia - RODSAN</div>
                <div class="card-body">
                    <h4 class="text-info"> Información relevante </h4>
                    <p class="card-text">En este módulo podemos encontrar los usuarios dirijidos en la Farmacia los cuales son de suma importancia.</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card border-danger mb-3" style="max-width: 20rem;">
                <div class="card-header">Farmacia - RODSAN</div>
                <div class="card-body">
                    <h4  class="text-danger"> Detente !! </h4>
                    <p class="card-text"> No elimines ningun usuario sin autorizacion o antes haber confirmado que ya no sea necesario.</p>
                </div>
            </div>
        </div> 
        <div class="col">
            <div class="card border-warning mb-3" style="max-width: 20rem;">
                <div class="card-header">Farmacia - RODSAN</div>
                <div class="card-body">
                    <h4 class="text-warning" > Cuidado !! </h4>
                    <p class="card-text">Al insertar un nuevo usuario verifica que los datos se hallan guardado correctamente.</p>
                </div>
            </div>
        </div>
    </div>
    </div>
    
