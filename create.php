<?php

require_once('Database.php');

$insert = new Database('marlin-oop', 'root', '');

$name = trim($_POST['name']);
$email = trim($_POST['email']);

if(!empty($name) && !empty($email)){
  $data = ['name' => $name, 'email' => $email];

  $insert->insert('users', $data);

  header('Location: index.php');
}else {
  echo "Заполните все поля!";
};

