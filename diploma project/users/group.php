<?php

require_once('../init.php');


$id = $_GET['id'];
$group = $_GET['group'];
$user = new User;
$user->update('users', $id, ['group_id' => $group]);

Redirect::to('index.php');