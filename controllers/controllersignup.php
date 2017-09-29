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
var_dump($users);










 ?>
