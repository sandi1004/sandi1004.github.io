<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
           
        <link href="../../css/estilos.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>

<!-- Login 5 - Bootstrap Brain Component -->
<section class="p-3 p-md-4 p-xl-5">
  <div class="container">
    <div class="card border-light-subtle shadow-sm">
      <div class="row g-0">
        <div class="col-12 col-md-6 text-bg-primary">
          <div class="d-flex align-items-center justify-content-center h-100">
            <div class="col-10 col-xl-8 py-3">
                <img class="img-fluid rounded mb-1" loading="lazy" src="https://utsem.edomex.gob.mx/sites/utsem.edomex.gob.mx/files/images/Imagenes%20de%20pie/LOGO_UTSEM.png" width="365" height="70">
              <hr class="border-primary-subtle mb-2">
              <h3 class="h3 mb-1">AULA VIRTUAL UTSEM</h3>
              <p class="lead m-0">Aula Virtual de la Universidad Tecnológica del Sur del Estado de México </p>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-6">
          <div class="card-body p-3 p-md-4 p-xl-5">
            <div class="row">
              <div class="col-12">
                <div class="mb-3">
                    <h3 style="text-align: center">AULA VIRTUAL UTSEM</h3>
                </div>
              </div>
            </div>
            <form method="POST" action="../../controlador/usuariocontroller.php">
             <div class="row">
              <div class="col-12">
                <p class="mt-5 mb-2">Reestablecer contraseña mediante un envio de correo</p>
              </div>
            </div>
              <div class="row gy-3 gy-md-4 overflow-hidden">
                <div class="col-12">
                    <input type="hidden" name="accion" value="rescontra"/>
                  <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                  <input type="email" class="form-control" name="txtu" id="email" placeholder="name@example.com" required>
                </div>
                  
             <div class="row">
              <div class="col-12">
                <p class="mt-5 mb-2">Revisa el correo despues de enviar para revisar tu contraseña </p>
              </div>
            </div>

                <div class="col-12">
                  <div class="d-grid">
                    <button class="btn bsb-btn-xl btn-primary" type="submit">Enviar</button>
                  </div>
                </div>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>    
    </body>
</html>
