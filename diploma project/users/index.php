<?php
  require_once('../init.php');

  $user = new User;
  if($user->data()->group_id != 2){
    Session::flash('noAdmin', 'Вы не являетесь администратором сайта!');
    Redirect::to('../index.php');
  }else {
    $users = $user->get('users');
  }
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
              <a href="../profile.php" class="nav-link">Профиль</a>
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
                  <?php if($user->group_id == 1): ?>
                    <a href="group.php?id=<?= $user->id; ?>&group=2" class="btn btn-success">Назначить администратором</a>
                  <?php elseif($user->group_id == 2): ?>
                    <a href="group.php?id=<?= $user->id; ?>&group=1" class="btn btn-danger">Разжаловать</a>
                  <?php endif; ?>
                  <a href="user.php?id=<?= $user->id; ?>" class="btn btn-info">Посмотреть</a>
                  <a href=ass="btn btn-primary">
                    <a href="edit.php?id=<?= $user->id; ?>" class="btn btn-warning">Редактировать</a>
                  <a href="delete.php?id=<?= $user->id; ?>" class="btn btn-danger" onclick="return confirm('Вы уверены?');">Удалить</a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>  
  </body>
</html>
