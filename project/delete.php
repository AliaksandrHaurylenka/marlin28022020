<?php
require_once('configurations.php');
require_once ('Database.php');
require_once ('Config.php');
require_once ('Users.php');
require_once ('Redirect.php');

$id = $_GET['id'];
$users = new Users;
$users->delete('users', ['id', '=', $id]);

Redirect::to('index.php');
