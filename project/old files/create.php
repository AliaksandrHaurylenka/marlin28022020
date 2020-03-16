<?php

require_once('Database.php');

$name = strip_tags(trim($_POST['name']));
$email = strip_tags(trim($_POST['email']));

if(!empty($name) && !empty($email)){
  $data = 
  [
    'name' => $name, 
    'email' => $email
  ];

  Database::getInstance()->insert('users', $data);

  header('Location: index.php');
}else {
  echo "Заполните все поля!";
};
