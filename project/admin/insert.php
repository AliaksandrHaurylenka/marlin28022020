<?php
require_once('../init.php');

if(Input::exists()){
  if(Token::check(Input::get('token'))){
    
    $validate = new Validate;
   
    $validation = $validate -> check($_POST, [
      'name' => [
        'required' => true,
        'min' => 2,
        'max' => 100,
      ],
  
      'email' => [
        'required' => true,
        'min' => 2,
        'max' => 30,
        'unique' => 'users'
      ],
  
      'password' => [
        'required' => true,
        'min' => 6
      ],
  
      'repeadpassword' => [
        'required' => true,
        'matches' => 'password'
      ]
    ]);

    
    if($validation->passed()){
      $user = new User;
      $user -> create('users', [
        'name' => strip_tags(trim(Input::get('name'))),
        'email' => strip_tags(trim(Input::get('email'))),
        'password' => strip_tags(trim(password_hash(Input::get('password'), PASSWORD_DEFAULT)))
      ]);
      Session::flash('success', 'Добавлен новый пользователь!');
      // $session = Session::flash('success', 'Добавлен новый пользователь!');
      // var_dump($session); die;
      Redirect::to('/project/admin/usersAll.php');
    } else {
      foreach($validation->errors() as $error){
        echo $error . '<br>';
      }
    }
  }
  
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
  <body class="container mt-5">
    
      <h2 class="mt-5">Добавить пользователя</h2>
      <form action="" method="post">
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Введите имя" value="<?= Input::get('name') ?>">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Введите email" value="<?= Input::get('email') ?>">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Введите пароль">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword2">Repeat Password</label>
          <input type="password" name="repeadpassword" class="form-control" id="exampleInputPassword2" placeholder="Повторите пароль">
        </div>
        <input type="hidden" name="token" value="<?= Token::generate(); ?>">
        <button type="submit" class="btn btn-primary">Добавить</button>
        <button class="btn btn-success"><a href="/project/admin/usersAll.php" class="text-white">Назад</a></button>
      </form>
   

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>