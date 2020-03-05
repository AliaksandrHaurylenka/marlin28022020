<?php
require_once('Database.php');

$usersDel = new Database('marlin-oop', 'root', '');

$id = $_GET['id'];

$usersDel->delete('users', $id);

header('Location: index.php');
