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
      ],

      'date' => [
        'required' => true,
      ],
    ]);
  
    if($validation->passed()){
      $user = new User;
      $user -> create('users', [
        'name' => strip_tags(trim(Input::get('name'))),
        'email' => strip_tags(trim(Input::get('email'))),
        'password' => strip_tags(trim(password_hash(Input::get('password'), PASSWORD_DEFAULT))),
        'date' => Input::get('date')
      ]);
      Session::flash('success', 'Вы зарегестрированы!');
      Redirect::to('index.php');
    } else {
      foreach($validation->errors() as $error){
        // echo $error . '<br>';
        // var_dump($error . '<br>');
      }
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
    	  <h1 class="h3 mb-3 font-weight-normal">Регистрация</h1>

        <div class="alert alert-danger">
          <ul>
            <li>Ошибка валидации 1</li>
            <li>Ошибка валидации 2</li>
            <li>Ошибка валидации 3</li>
          </ul>
        </div>

        <div class="alert alert-success">
          Успешный успех
        </div>

        <div class="alert alert-info">
          Информация
        </div>

    	  <div class="form-group">
          <input type="email" class="form-control" name="email" placeholder="Email">
        </div>
        <div class="form-group">
          <input type="text" class="form-control" name="name" placeholder="Ваше имя">
        </div>
        <div class="form-group">
          <input type="password" class="form-control" name="password" placeholder="Пароль">
        </div>
        
        <div class="form-group">
          <input type="password" class="form-control" name="repeadpassword" placeholder="Повторите пароль">
        </div>

        <div class="form-group">
          <input type="date" name="date" class="form-control" id="date">
        </div>

    	  <div class="checkbox mb-3">
    	    <label>
    	      <input type="checkbox"> Согласен со всеми правилами
    	    </label>
    	  </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Зарегистрироваться</button>
        <input type="hidden" name="token" value="<?= Token::generate(); ?>">
    	  <p class="mt-5 mb-3 text-muted">&copy; 2017-2020</p>
    </form>
</body>
</html>
