<?php
require_once('init.php');

$errors = null;
$login = true;

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
      if($login){
        Redirect::to('index.php');
      }else {
        Session::flash('flash-info', "Логин или пароль неверны!");
        // $login = false;
        Redirect::to('login.php');
      }
    } else {
      $errors = $validation->errors();
    }
  }
  
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Register</title>
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <form action="" method="post" class="form-signin">
    	  <img class="mb-4" src="images/apple-touch-icon.png" alt="" width="72" height="72">
    	  <h1 class="h3 mb-3 font-weight-normal">Авторизация</h1>

        <?php if($errors): ?>
          <div class="alert alert-danger">
            <ul>
              <?php foreach($errors as $error): ?>
                <li><?= $error; ?></li>
              <?php endforeach; ?>
            </ul>
          </div>
        <?php endif; ?>

        <?php if(Session::exists('flash-info')): ?>
          <div class="alert alert alert-info">
            <?= Session::flash('flash-info'); ?>
          </div>
        <?php endif; ?>

    	  <div class="form-group">
          <input type="email" class="form-control" name="email" placeholder="Email" value="<?= Input::get('email'); ?>">
        </div>
        <div class="form-group">
          <input type="password" class="form-control" name="password" placeholder="Пароль">
        </div>

    	  <div class="checkbox mb-3">
    	    <label>
    	      <input type="checkbox" name="remember"> Запомнить меня
    	    </label>
        </div>
        <input type="hidden" name="token" value="<?= Token::generate(); ?>">
    	  <button class="btn btn-lg btn-primary btn-block" type="submit">Войти</button>
    	  <p class="mt-5 mb-3 text-muted">&copy; 2017-2020</p>
    </form>
</body>
</html>
