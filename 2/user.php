<?php
header('Content-Type: text/html; charset=utf-8');

include('Database.php');
$users = new Database('marlin-oop', 'root', '');
$id = $_GET['id'];
$user = $users->getOne('users', $id);
// var_dump($user); die;
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
      <h2 class="mt-5">Вывод одной записи</h2>
      <table class="table mt-5">
        <thead>
            <tr>
              <th scope="col">id</th>
              <th scope="col">First</th>
              <th scope="col">Email</th>
            </tr>
        </thead>
        <tbody>          
          <tr>          
            <th scope="row"><?= $user['id']; ?></th>
            <td><?= $user['name']; ?></td>
            <td><?= $user['email']; ?></td>      
          </tr>         
        </tbody>
      </table>
      <button class="btn btn-primary"><a href="/" class="text-white">На главную</a></button>
    </div>
   

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>