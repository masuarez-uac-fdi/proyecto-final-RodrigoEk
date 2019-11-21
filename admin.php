<?php include 'partials/head.php'; ?>
<?php include 'partials/menu.php'; ?>
<?php
  session_start();
?>

<?php include 'partials/menu.php';?>
<div class="container">

  <div class="starter-template">
    <div class="jumbotron">
      <div class="container text-center">
        <h1><strong>Bienvenido</strong><?echo $_SESSION["usuario"]["nombre"]; ?></h1>
        <p>Nos comunicaremos contigo cuando el sitio este disponible para su uso</p>
        <P>
          <a href="login.php" class="btn btn-primary btn-lg">Cerrar Sesion</a>
        </P>
      </div>
    </div>
  </div>
</div>

</div>

<?php include 'partials/footer.php';?>