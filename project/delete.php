<?php
require_once('Database.php');

$id = $_GET['id'];
$users = Database::getInstance()->delete('users', ['id', '=', $id]);

header('Location: index.php');
