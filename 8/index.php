<?php
require_once('Database.php');

// $users = Database::getInstance()->insert('users', 
//                                               [
//                                                 'name' => 'John',
//                                                 'email' => 'john@gmail.com'
//                                               ]);

$users = Database::getInstance()->get('users', ['name', '=', 'John']);

if($users->error()){
  echo "ERROR";
}else {
  var_dump($users->first()->email); die;
}
