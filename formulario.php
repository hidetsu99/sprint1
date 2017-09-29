<?php
require("controllers/controller.php")?>
<!DOCTYPE html>
<html>
<head>
	   <title>FORMULARIO PROYECTO</title>
	    <!-- Latest compiled and minified CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
      <link rel="stylesheet" href="css/style-for.css">
			  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<div class="header_form">
		<!--HEADER-->
		<header>
      <i class="fa fa-bars fa-2x" aria-hidden="true" data-toggle="modal" data-target="#faBars"></i>
      <img src="img/logo.jpg" alt="logo" class="logo_header">
      <?php if (!isset($_SESSION['user'])): ?>
      	<i class="fa fa-search fa-2x" aria-hidden="true"></i>
			<?php endif; ?>
			<?php var_dump($_SESSION['user']); ?>
			<?php //if (isset($_SESSION['avatar'])) {




			//} ?>
    </header>
	</div>
	<!--CONTAINER-->
  <div class="container" >
    <form class="form-group" action="formulario.php" method="post" enctype="multipart/form-data">
      <div class="row">
        <div class="form-group col-md-4 col-md-offset-4">
          <h1>Registrarse</h1>
          <hr>
        </div>
      </div>
      <div class="row">
  		  <div class="form-group col-md-2 col-md-offset-4">
  		    <label for="nombre"></label>
          <input type="text" class="form-control" id="nombre" name="user" placeholder="Nombre" value="<?php
					if (!isset($errores['user']) && isset($_POST['user'])) {
					  echo $_POST['user'];
					}?>">
					<?php if (isset($errores['user'])) {echo $errores['user'];}?>
        </div>
        <div class="form-group col-md-2">
         <label for="apellido"></label>
            <input type="text" class="form-control" id="nombre" placeholder="Apellido" name='lastName' value="<?php
						  if (!isset($errores['lastName']) && isset($_POST['lastName'])) {
						  echo $_POST['lastName'];
						} ?>">
						<?php  if (isset($errores['lastName'])) {
						  echo $errores['lastName'];
						} ?>
				</div>
      </div>
      <div class="row">
          <div class="form-group col-md-4 col-md-offset-4">
            <input type="text" class="form-control" id="email" placeholder="Ingrese su correo electronico" name='email' value="<?php if (!isset($errores['email'])&&isset($_POST['email'])) {
								  echo $_POST['email'];
								} ?>">
						<?php if (isset($errores['email'])) {
								  echo $errores['email'];
								} ?>
					</div>
      </div>
      <div class="row">
        <div class="form-group col-md-2 col-md-offset-4">
         <label for="genero"></label>
        	<input type="radio" value="masculino" name="genero"> Hombre
					<?php if (isset($errores['genero'])) {
						echo "<br>" . $errores['genero'];
					} ?>
				</div>
        <div class="form-group col-md-2">
          <input type="radio" value="femenino" name="genero"> Mujer
				</div>
			</div>
      <div class="row">
        <div class="form-group col-md-2 col-md-offset-4">
          <label for="contraseña"></label>
          <input type="password" class="form-control" id="contraseña" placeholder="Clave" name="password">
					<?php  if (isset($errores['password'])) {
							  echo $errores['password'];
							} ?>
				</div>
        <div class="form-group col-md-2">
        	<label for="confirmacion"></label>
          <input type="password" class="form-control" id="confirmacion" placeholder="Clave" name="confirm">
					<?php if (isset($errores['confirm'])) {
		 		  echo $errores['confirm'];
		 		} ?>
				</div>
      </div>
			<div class="row">
				<div class="form-group col-md-2 col-md-offset-4">
					<label for="exampleInputFile">Foto de perfil</label>
    			<input type="file" id="exampleInputFile" name="avatar">
					<?php if(isset($errores['img'])){
		 		   echo $errores['img'];
		 		 }?>
				</div>
  		</div>
      <div class="row">
        <div class="form-group col-md-4 col-md-offset-4 ">
          <a href="index.php"><button type="submit" class="btn btn-primary btn-block">Registrarse</button></a> <!--solucionar!-->
        </div>
      </div>
    </form>
 <?php var_dump($usuario['img']); ?>
		<!-- FOOOTER -->
		<footer class="main-footer">
			<ul class="ul_footer">
				<div class="help-footer">
					<li class="url_footer"><a href="faq.php">FAQ</a></li>
					<li class="url_footer"><a href="#">Terms y Conditions</a></li>
					<li class="url_footer"><a href="#">Help</a></li>
				</div>
				<br class="br_footer">
				<div class="icons-footer">
						<li class="icons_footer"><a href="#"><i class="fa fa-facebook-square"></i></a></li>
						<li class="icons_footer"><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
						<li class="icons_footer"><a href="#"><i class="fa fa-paypal" aria-hidden="true"></i></a></li>
				</div>
			</ul>
		</footer>
  </div>
  <!-- CArgar antes de BOOTSTRAP//google cdn jquery hosted//Jquery-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
