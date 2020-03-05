<?php
header('Content-Type: text/html; charset=utf-8');

include('Database.php');
$user = new Database('marlin-oop', 'root', '');
$id = $_GET['id'];
$user = $user->getOne('users', $id);
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
      <h2 class="mt-5">Обновление данных</h2>
      <form action="update.php" method="post">
      <div class="form-group">
          <input type="text" class="form-control" id="name" value="<?= $user['id']; ?>" name="id" required>
        </div>
        <div class="form-group">
          <label for="name">Имя</label>
          <input type="text" class="form-control" id="name" value="<?= $user['name']; ?>" name="name" required>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Email</label>
          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $user['email']; ?>" name="email" required>
        </div>
        <button type="submit" class="btn btn-primary">Обновить</button>
      </form>
      
      <!-- <button><a href="/">Users</a></button> -->
    </div>
   

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>