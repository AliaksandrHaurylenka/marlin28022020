<?php

require_once('Database.php');

$name = trim($_POST['name']);
$email = trim($_POST['email']);
$id = $_POST['id'];

if(!empty($name) && !empty($email)){
  $data = 
  [
    'name' => $name, 
    'email' => $email
  ];

  Database::getInstance()->update('users', $id, $data);

  header('Location: index.php');
}else {
  echo "Заполните все поля!";
};

?>
