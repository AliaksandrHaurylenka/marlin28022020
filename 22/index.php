<?php
require_once('init.php');

$user = new User;
echo Session::flash('success');

if($user->hasPermission('admin')){
  echo "Вы админ!";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <title>22</title>
</head>
<body class="container mt-5">
  <?php if($user->isLoggedIn()): ?>
    <h1>Привет, <?= $user->data()->name; ?></h1>
    <button class="btn btn-danger"><a href='logout.php' class="text-white">Выйти</a></button>
    <button class="btn btn-primary"><a href='update.php?id=<?= $user->data()->id; ?>' class="text-white">Обновить профиль</a></button>
    <button class="btn btn-primary"><a href='changepassword.php?id=<?= $user->data()->id; ?>' class="text-white">Обновить пароль</a></button>
  <?php else: ?>
    <button class="btn btn-success"><a href="register.php" class="text-white">Регистрация</a></button>
    <button class="btn btn-primary"><a href="login.php" class="text-white">Войти</a></button>
  <?php endif; ?> 
</body>
</html>