<?php include 'partials/head.php'; ?>
<?php include 'partials/menu.php'; ?>

<div class="container">

  <div class="starter-template">
    <br>
    <br>
    <br>
    <div class="row">
      <div class=".col-md-4 col-md-offset-4">
        <div class="panel panel-default">
          <div class="panel-body">
            <form action="registroCode.php" method="POST" role="form">
              <legend>Registrate</legend>

              <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="txtNombre" class="form-control" id="nombre" autofocus required placeholder="Ingresa tu nombre: ">
              </div>

              <div class="form-group">
                <label for="email">e-mail</label>
                <input type="email" name="txtEmail" class="form-control" id="email" autofocus required placeholder="Ingresa una direccion de correo electronico: ">
              </div>
            
              <div class="form-group">
                <label for="usuario">Usuario</label>
                <input type="text" name="txtUsuario" class="form-control" id="usuario" autofocus required placeholder="Ingresa un nombre de usuario">
              </div>

              <div class="form-group">
                <label for="contraseña">Contraseña</label>
                <input type="password" name="txtContraseña" class="form-control" required id="contraseña" placeholder="*****">
              </div>
            
              
            
              <button type="submit" class="btn btn-success">Registrar</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

<?php include 'partials/footer.php';?>