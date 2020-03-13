<?php
require_once ('Database.php');
require_once ('Config.php');

$GLOBALS['config'] = [
  'mysql' => [
    'host' => 'localhost',
    'dbname' => 'marlin-oop',
    'username' => 'root',
    'password' => ''
  ],
];

// var_dump(Config::get('mysql.host'));
$users = Database::getInstance()->get('users');