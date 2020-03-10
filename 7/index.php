<?php
require_once('Database.php');

$users = Database::getInstance()->insert('users', 
                                              [
                                                'name' => 'John',
                                                'email' => 'john@gmail.com'
                                              ]);

if($users->error()){
  echo "ERROR";
}else {
  var_dump($users->results());
}
die;