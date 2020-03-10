<?php

require_once('Database.php');

// var_dump($_POST); die;


$data = $_POST;

if(!empty($data)){

  Database::getInstance()->insert('users', $data);

  header('Location: index.php');
}else {
  echo "Заполните все поля!";
};
