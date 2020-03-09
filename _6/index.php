<?php
require_once('Database.php');

// $users = Database::getInstance()->get('users');
$users = Database::getInstance()->get('user', ['name', '=', 'Алекс']);
// $users = Database::getInstance()->delete('users', ['name', '=', 'Александр']);

if($users->error()){
  echo "ERROR";
}else {
  var_dump($users->results());
}
die;