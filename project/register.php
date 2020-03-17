<?php
require_once('init.php');

if(Input::exists()){
  if(Token::check(Input::get('token'))){
    $validate = new Validate();

    $validation = $validate -> check($_POST, [
      'name' => [
        'required' => true,
        'min' => 2,
        'max' => 100,
      ],
  
      'email' => [
        'required' => true,
        'email' => true,
        'max' => 50,
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
      Session::flash('success', 'Вы зарегестрированы!');
      Redirect::to('/project');
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
  <form action="" method="post">
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" value="<?= Input::get('name') ?>">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Email address</label>
      <input type="text" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="<?= Input::get('email') ?>">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword2">Repeat Password</label>
      <input type="password" name="repeadpassword" class="form-control" id="exampleInputPassword2" placeholder="Repeat Password">
    </div>
    <input type="hidden" name="token" value="<?= Token::generate(); ?>">
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</body>
</html>