<?php
require_once('Database.php');

// $users = Database::getInstance()->query("SELECT * FROM users");
$users = Database::getInstance()->query("SELECT * FROM users");
// $user = Database::getInstance()->query("SELECT * FROM users WHERE name = ?", ['Алекс']);

if($users->error()){
  echo "ERROR";
}else {
  var_dump($users->results());
}
die;