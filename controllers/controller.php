<?php
/* El cliente pide que funcione la registración del sitio pudiendo guardar los usuarios en un archivo JSON.

- Debe existir una validación del lado del servidor.

- En caso de que haya datos inválidos los datos que estaban bien deben seguirse viendo en pantalla (persistir).

- El cliente pide que en la registración, el usuario pueda subir una foto de perfil.

- El cliente pide que funcione el login.

- El formulario debe estar validado desde el lado del servidor.

- Debe estar la opción de "Recordar usuario"*/
  define("ROOT1", "db/usuarios.json");
  $errores = [];
  if ($_POST) {
    $user = trim($_POST['user']);
    if (empty($user)) {
    	$errores['user'] = "El nombre es obligatorio";
    }
    $lastName = trim($_POST['lastName']);
    if (empty($lastName)) {
      $errores['lastName'] = "El apellido es obligatorio";
    }
    $email = trim($_POST['email']);
    if (empty($email)) {
    	$errores['email'] = "El email es obligatorio";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    	$errores['email'] = "El email no es valido";
    }
    $password = trim($_POST['password']);
    if (empty($password)) {
    	$errores['password'] = "La contraseña es obligatoria";
    }
    $confirm = trim($_POST['confirm']);
    if ($_POST['confirm'] != $_POST['password']) {
      $errores['confirm'] = "La contraseña tiene que coincidir";
    }
    $img = $_FILES['avatar'];
    if (empty($_FILES['avatar'])) {
      $errores['img'] = "Falta foto de perfil";
    }

  // CREA UNA IMG
  $imgName = uniqid();
  $imgAvatar = guardarImagen('avatar', $imgName, 'db/imgUsers/');
  // SIRVE PARA CREAR EL USUARIO
  $usuario = [
  	'user' => $user,
  	'email' => $email,
  	'password' => password_hash($password, PASSWORD_DEFAULT),
    'confirm' => password_hash($confirm, PASSWORD_DEFAULT),
    'img' => $imgAvatar
  ];

  //TOMA LOS DATOS DADOS
  if (file_exists(ROOT1)) {
  	$json = file_get_contents(ROOT1);
  	$users = json_decode($json, true);
  } else {
  	$users = [];
  }
  //LOS MANDA A UN JSON
  $users[] = $usuario;
  $json = json_encode($users);
  file_put_contents(ROOT1, $json);
}
  // funcion para GUARDAR LA IMG
  function guardarImagen($inputName, $imgName, $path)
  {
    if ($_FILES[$inputName]['error'] == UPLOAD_ERR_OK) {
      $extension = pathinfo($_FILES[$inputName]['name'], PATHINFO_EXTENSION);
      move_uploaded_file($_FILES[$inputName]['tmp_name'],$path.$imgName.'.'.$extension);
      return $imgName.'.'.$extension;
    }
  }





 ?>
