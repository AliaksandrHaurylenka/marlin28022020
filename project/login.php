<?php
require_once('init.php');

if(Input::exists()){
  if(Token::check(Input::get('token'))){
    $validate = new Validate();

    $validation = $validate -> check($_POST, [
      'email' => [
        'required' => true,
        'email' => true,
      ],
  
      'password' => [
        'required' => true,
      ],
    ]);
  
    if($validation->passed()){
      $user = new User;
      $remember = (Input::get('remember')) === 'on' ? true : false;
      $login = $user->login(strip_tags(trim(Input::get('email'))), strip_tags(trim(Input::get('password'))), $remember);
      // var_dump($login); die;
      if($login){
        Redirect::to('index.php');
      }else {
        echo "Вы не зарегестрированы!";
      }
    } else {
      foreach($validation->errors() as $error){
        echo $error . '<br>';
      }
    }
  }
  
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <title>Document</title>
</head>
<body class="container mt-5">
  <?= Session::flash('success'); ?>
  <form action="" method="post">
    <div class="form-group">
      <label for="exampleInputEmail1">Email address</label>
      <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" value="<?= Input::get('email') ?>">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    </div>
    <div class="form-check mb-3">
      <input type="checkbox" name="remember" class="form-check-input" id="exampleCheck1">
      <label class="form-check-label" for="exampleCheck1">запомнить меня</label>
    </div>
    <input type="hidden" name="token" value="<?= Token::generate(); ?>">
    <button type="submit" class="btn btn-primary">Войти</button>
  </form>
</body>
</html>
