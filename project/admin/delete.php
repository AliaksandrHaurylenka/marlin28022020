<?php
require_once('../init.php');


$id = $_GET['id'];
$users = new User;
$users->delete('users', ['id', '=', $id]);

Redirect::to('/project');
