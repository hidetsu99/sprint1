<?php session_start();
define("ROOT1", "db/usuarios.json");
if ($_POST) {
  $email = trim($_POST['email']);
  if (empty($email)) {
    $errores['email'] = "El email es obligatorio";
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errores['email'] = "El email no es valido";
  }
  $password = trim($_POST['pass']);
  if (empty($password)) {
    $errores['password'] = "La contraseña es obligatoria";
  }
}
if (file_exists(ROOT1)) {
  $json = file_get_contents(ROOT1);
  $users = json_decode($json, true);
} else {
  $users = [];
}
foreach ($users as $key) {
  $i = 0;
  $i++;
  if ($users[$i]['email'] == $_POST['email'] && password_verify($_POST['pass'],$users[$i]['password'])) {
    echo "hola";
  }
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div class="container">
      <header>
        <i class="fa fa-bars fa-2x" aria-hidden="true" data-toggle="modal" data-target="#faBars"></i>
        <img src="img/logo.jpg" alt="logo" class="logo_header">
        <i class="fa fa-search fa-2x" aria-hidden="true"></i>
      </header>
      <div class="signup">
        <form class="signupform" action="signup.php" method="post">
          <label for="">Email</label>
          <input type="email" name="email" value="">
          <label for="">Contraseña</label>
          <input type="password" name="pass" value="">
          <input type="submit" name="submit" value="">
        </form>
      </div>
    </div>
  </body>
</html>
<?php var_dump($users); ?>
