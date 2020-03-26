<?php
  require_once('init.php');

  $user = new User;

  $errors = null;

  if(Input::exists()){
    if(Token::check(Input::get('token'))){
      
      $validate = new Validate;
    
      $validation = $validate -> check($_POST, [
    
        'oldpassword' => [
          'required' => true,
          'min' => 6
        ],

        'password' => [
          'required' => true,
          'min' => 6
        ],
    
        'repeadpassword' => [
          'matches' => 'password',
          'required' => true,
        ]
      ]);

      
      if($validation->passed()){

        if(password_verify(Input::get('oldpassword'), $user->data()->password)){
          $user->update('users', $user->data()->id, 
            [
              'password' => strip_tags(trim(password_hash(Input::get('password'), PASSWORD_DEFAULT)))
            ]);
            Session::flash('success', 'Ваш пароль обновлен!');
            Redirect::to('index.php');
        } else {
          echo "Пароль старый не совпадает!";
        }
      } else {
        foreach($validation->errors() as $error){
          $errors = $validation->errors();
        }
      }
    }
    
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Profile</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
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
            <a class="nav-link" href="index.php">Главная</a>
          </li>
          <?php if($user->isLoggedIn() && $user->data()->group_id == 2): ?>
            <li class="nav-item">
              <a class="nav-link" href="users/index.php">Управление пользователями</a>
            </li>
          <?php endif; ?>
        </ul>

        <ul class="navbar-nav">
          <li class="nav-item">
            <li class="nav-item">
              <a href="profile.php" class="nav-link">Профиль</a>
            </li>
            <a href="logout.php" class="nav-link">Выйти</a>
          </li>
        </ul>
      </div>
    </nav>

   <div class="container">
     <div class="row">
       <div class="col-md-8">
         <h1>Изменить пароль</h1>         
         <?php if($errors): ?>
          <div class="alert alert-danger">
            <ul>
              <?php foreach($errors as $error): ?>
                <li><?= $error; ?></li>
              <?php endforeach; ?>
            </ul>
          </div>
        <?php endif; ?>

        <?= Session::flash('success', '<div class="alert alert-success">Пароль обновлен!</div>'); ?>

         <ul>
           <li><a href="profile.php">Изменить профиль</a></li>
         </ul>
         <form action="" method="post" class="form">
           <div class="form-group">
             <label for="current_password">Текущий пароль</label>
             <input type="password" id="current_password" name="oldpassword" class="form-control">
           </div>
           <div class="form-group">
             <label for="current_password">Новый пароль</label>
             <input type="password" id="current_password" name="password" class="form-control">
           </div>
           <div class="form-group">
             <label for="current_password">Повторите новый пароль</label>
             <input type="password" id="current_password" name="repeadpassword" class="form-control">
           </div>
           <input type="hidden" name="token" value="<?= Token::generate(); ?>">
           <div class="form-group">
             <button class="btn btn-warning">Изменить</button>
           </div>
         </form>


       </div>
     </div>
   </div>
</body>
</html>