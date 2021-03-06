<?php

class User {
  private $db, $data, $session_user, $isLoggedIn;

  public function __construct($user = null){
    $this->db = Database::getInstance();
    $this->session_user = Config::get('session.user_session');

    if(!$user){
      if(Session::exists($this->session_user)){
        $user = Session::get($this->session_user);

        if($this->find($user)){
          $this->isLoggedIn = true;
        }else {
          $this->logout();
        }
      }     
    }else {
      $this->find($user);
    }
  }

  public function create($fields = []){
    $this->db->insert('users', $fields);
  }

  public function login($email = null, $password = null){
    if($email){
      $user = $this->find($email);
      if($user){
        if(password_verify($password, $this->data()->password)){
          Session::put($this->session_user, $this->data()->id);
          return true;
        } 
      }      
    }
    return false;
  }

  public function find($value = null){
    if(is_numeric($value)){
      $this->data = $this->db->get('users', ['id', '=', $value])->first();
      var_dump($this->data); die;
    }else {
      $this->data = $this->db->get('users', ['email', '=', $value])->first();
    }

    if($this->data){
      return true;
    }
    return false;
  } 

  public function data(){
    return $this->data;
  }

  public function isLoggedIn(){
    return $this->isLoggedIn;
  }

  public function logout(){
    return Session::delete($this->session_user);
  }
}