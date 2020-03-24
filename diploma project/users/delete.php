<?php
require_once('../init.php');


$id = $_GET['id'];
$users = new User;
if($user->data()->group_id != 2){
  Session::flash('noAdmin', 'Вы не являетесь администратором сайта!');
  Redirect::to('../index.php');
}else {
  $users->delete('users', ['id', '=', $id]);
  Redirect::to('index.php');
}
