<?php
require_once('../init.php');

$id = $_GET['id'];
$users = new User;
$user = $users->getOne("users", ['id', '=', $id]);


if(Input::exists()){
  if(Token::check(Input::get('token'))){
    
    $validate = new Validate;
   
    $validation = $validate -> check($_POST, [
      'name' => [
        'required' => true,
        'min' => 2,
        'max' => 100,
      ],
  
      'status' => [
        'min' => 6,
        'max' => 100,
      ],
    ]);

    if($validation->passed()){
      $user = new User;
      $user -> update('users', $id, [
        'name' => strip_tags(trim(Input::get('name'))),
        'status' => strip_tags(trim(Input::get('status'))),
      ]);
      // Session::flash('success', 'Вы зарегистрированы!');
      Redirect::to('index.php');
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
              <a class="nav-link" href="../index.php">Главная</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="users/index.php">Управление пользователями</a>
            </li>
          </ul>

          <ul class="navbar-nav">
            <li class="nav-item">
              <li class="nav-item">
                <a href="profile.html" class="nav-link">Профиль</a>
              </li>
              <a href="../logout.php" class="nav-link">Выйти</a>
            </li>
          </ul>
        </div>
    </nav>

   <div class="container">
     <div class="row">
       <div class="col-md-8">
         <h1>Профиль пользователя - <?= $user->name; ?></h1>
         <div class="alert alert-success">Профиль обновлен</div>
         
         <div class="alert alert-danger">
           <ul>
             <li>Ошибка валидации</li>
           </ul>
         </div>
         <form action="" method="post" class="form">
           <div class="form-group">
             <label for="username">Имя</label>
             <input type="text" id="username" name="name" class="form-control" value="<?= $user->name; ?>">
           </div>
           <div class="form-group">
             <label for="status">Статус</label>
             <input type="text" id="status" name="status" class="form-control" value="<?= $user->status; ?>">
           </div>
           <input type="hidden" name="token" value="<?= Token::generate(); ?>">
           <div class="form-group">
             <button class="btn btn-warning">Обновить</button>
           </div>
         </form>


       </div>
     </div>
   </div>
</body>
</html>