<?php
require_once('Database.php');

$users = Database::getInstance()->getAll('users');

// var_dump($users->count()); die;
if($users->error()){
  echo "ERROR";
}else {
  var_dump($users->results());
}
die;