<?php
session_start();

require_once ('classes/Database.php');
require_once ('classes/Config.php');
require_once ('classes/Validate.php');
require_once ('classes/Input.php');
require_once ('classes/Token.php');
require_once ('classes/Session.php');
require_once ('classes/User.php');
require_once ('classes/Redirect.php');


$GLOBALS['config'] = [
  'mysql' => [
    'host' => 'localhost',
    'dbname' => 'marlin-oop',
    'username' => 'root',
    'password' => ''
  ],

  'session' => 'token_name',
];