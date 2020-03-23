<?php
  require_once('../init.php');

  $user = new User;
  $users = $user->get('users');
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Users</title>
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Custom styles for this template -->
  </head>

  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">User Management</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="../index.php">Главная</a>
          </li>
        </ul>

        <ul class="navbar-nav">
          <li class="nav-item">
            <li class="nav-item">
              <a href="profile.html" class="nav-link">Профиль</a>
            </li>
            <a href="../logout.php" class="nav-link">Выйти</a>
          </li>
        </ul>
      </div>
  </nav>

    

    <div class="container">
      <?php if($user->isLoggedIn()): ?>
        <h1>Привет, <?= $user->data()->name; ?></h1>
      <?php endif; ?>
      
      <div class="col-md-12">
        <h2>Пользователи</h2>
        <table class="table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Имя</th>
              <th>Email</th>
              <th>Действия</th>
            </tr>
          </thead>

          <tbody>

            <?php foreach ($users as $user): ?>
              <tr>
                <td><?= $user->id; ?></td>
                <td><?= $user->name; ?></td>
                <td><?= $user->email; ?></td>
                <td>
                  <a href="#" class="btn btn-success">Назначить администратором</a>
                  <a href="user.php?id=<?= $user->id; ?>" class="btn btn-info">Посмотреть</a>
                  <a href=ass="btn btn-primary">
                    <a href="edit.php?id=<?= $user->id; ?>" class="btn btn-warning">Редактировать</a>
                  <a href="delete.php?id=<?= $user->id; ?>" class="btn btn-danger" onclick="return confirm('Вы уверены?');">Удалить</a>
                </td>
              </tr>
            <?php endforeach; ?>

            <tr>
              <td>2</td>
              <td>John</td>
              <td>john@marlindev.ru</td>
              <td>
              	<a href="#" class="btn btn-danger">Разжаловать</a>
                <a href="#" class="btn btn-info">Посмотреть</a>
                <a href="#" class="btn btn-warning">Редактировать</a>
                <a href="#" class="btn btn-danger" onclick="return confirm('Вы уверены?');">Удалить</a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>  
  </body>
</html>
