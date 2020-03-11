<?php
require_once('Database.php');

$id = 1;
// $users = Database::getInstance()->update('users', $id,
//                                               [
//                                                 'name' => 'John',
//                                                 'email' => 'john@gmail.com'
//                                               ]);

$users = Database::getInstance()->get('users', ['id', '=', $id]);
var_dump($users->first()->name); die;
// if($users->error()){
//   echo "ERROR";
// }else {
//   var_dump($users->first()->email); die;
// }
