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
require_once ('classes/Cookie.php');


$GLOBALS['config'] = [
  'mysql' => [
    'host' => 'localhost',
    'dbname' => 'marlin-oop',
    'username' => 'root',
    'password' => ''
  ],

  'session' => [
    'token_name' => 'token',
    'user_session' => 'user',
  ],

  'cookie' => [
    'cookie_name' => 'hash',
    'cookie_expiry' => 604800 //1 неделя
  ]
];

if(Cookie::exists(Config::get('cookie.cookie_name')) && !Session::exists(Config::get('session.user_session'))){
  $hash = Cookie::get(Config::get('cookie.cookie_name'));
  $hashCheck = Database::getInstance()->get('user_session', ['hash', '=', $hash]);
  // var_dump($hashCheck); die;

  if($hashCheck->count()){
    // var_dump($hashCheck->first()->user_id); die;
    $user = new User($hashCheck->first()->user_id);
    // var_dump($user); die;
    $user->login();
  }
}