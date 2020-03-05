<?php

require_once('Database.php');
$usersUpdate = new Database('marlin-oop', 'root', '');

$name = trim($_POST['name']);
$email = trim($_POST['email']);
$id = $_POST['id'];

if(!empty($name) && !empty($email)){
  $data = ['name' => $name, 'email' => $email];

  $usersUpdate->update('users', $data, $id);

  header('Location: index.php');
}else {
  echo "Заполните все поля!";
};

?>
