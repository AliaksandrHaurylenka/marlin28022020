<?php

require_once('../init.php');


$id = $_GET['id'];
$group = $_GET['group'];
$user = new User;
if($user->data()->group_id != 2){
  Session::flash('noAdmin', 'Вы не являетесь администратором сайта!');
  Redirect::to('../index.php');
}else {
  $user->update('users', $id, ['group_id' => $group]);
  Redirect::to('index.php');
}
