<?php
require_once('Database.php');

$users = Database::getInstance()->get('users', ['name', '=', 'Рахим']);

if($users->error()){
  echo "ERROR";
}else {
  var_dump($users->results());
}
die;