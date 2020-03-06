<?php
require_once('Database.php');

$users = Database::getInstance()->getAll('users');

if($users->error()){
  echo "ERROR";
}else {
  // var_dump($users->results());
  $users->results();
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Hello, ООП!</title>
  </head>
  <body>
    <div class="container">
      <h2 class="mt-5">Вывод полной базы</h2>
      <table class="table mt-5">
        <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Имя</th>
              <th scope="col">Email</th>
              <th scope="col">Действия</th>
            </tr>
        </thead>
        <tbody>
          <?php foreach ($users->results() as $user): ?>
            <tr>          
              <th scope="row"><?= $user['id']; ?></th>
              <td><?= $user['name']; ?></td>
              <td><?= $user['email']; ?></td>
              <td>
                <button class="btn btn-warning">
                  <a href="user.php?id=<?= $user['id']; ?>" class="text-white">
                    Посмотреть
                  </a>                 
                </button>
                <button class="btn btn-primary">
                  <a href="edit.php?id=<?= $user['id']; ?>" class="text-white">
                    Редактировать
                  </a>                 
                </button>
                <button class="btn btn-danger">
                  <a href="delete.php?id=<?= $user['id']; ?>" class="text-white">
                    Удалить
                  </a>
                </button>
              </td>     
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
      <button class="btn btn-success mb-5"><a href="insert.php" class="text-white">Добавить</a></button>
   

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
