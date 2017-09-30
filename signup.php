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
if (isset($users)) {
  $i = 0;
  foreach ($users as $key) {
    if ($users[$i]['email'] == isset($_POST['email']) && password_verify($_POST['pass'],$users[$i]['password'])) {
      $_SESSION['online'] = "On line";
      header('Location: nuevo.php');
      break;
    }
    $i++;
  }
}
?>
