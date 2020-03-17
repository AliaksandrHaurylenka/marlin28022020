<?php
require_once('init.php');

var_dump(Config::get('session.user_session'));

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <title>15</title>
</head>
<body class="container mt-5">
  <button class="btn btn-success"><a href="register.php" class="text-white">Регистрация</a></button>
  <button class="btn btn-primary"><a href="login.php" class="text-white">Войти</a></button>
</body>
</html>