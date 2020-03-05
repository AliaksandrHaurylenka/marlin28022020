<?php

class Database{

  public $dbname;
  public $user;
  public $pass;
  public $pdo;

  public function __construct($dbname, $user, $pass)
  {
    $this->dbname = $dbname;
    $this->user = $user;
    $this->pass = $pass;
    $this->pdo = $this->includeDB();
  }

  function includeDB(){
    $pdo = new PDO("mysql:host=localhost; dbname=$this->dbname; charset=utf8", "$this->user", "$this->pass");
    return $pdo;
  }
    
  function getAll($table){
    $request = $this->pdo->prepare("SELECT * FROM $table");
    $request->execute();
    $request = $request->fetchAll(2);
    return $request;
  }

  function getOne($table, $id){
    $request = $this->pdo->prepare("SELECT * FROM $table WHERE `id` = ?");
    $request->execute([$id]);
    $request = $request->fetch(PDO::FETCH_ASSOC);
    return $request;
  }

  function insert($table, $data){
    //вытягиваем ключи массива
    $keys = array_keys($data);
    //объединяем в строку ключи массива через запятую
    $str_keys = implode(", ", $keys);
    //объединяем в строку ключи массива по правилу
    $str = ":".implode(", :", $keys);
    $request = $this->pdo->prepare("INSERT INTO $table ($str_keys) VALUES ($str)");
    $request->execute($data);
  }

  function update($table, $name, $email, $id){
    $request = $this->pdo->prepare("UPDATE $table SET `name` = :name, `email` = :email WHERE `id` = :id" );
    $request->execute(['name' => $name, 'email' => $email, 'id' => $id]);
  }

  function updateData($table, $data, $id){
    // $data_merge = array_merge($data, ['id' => $id]);
    // var_dump($data_merge); die;
    // $request = $this->pdo->prepare("UPDATE $table SET `name` = :name, `email` = :email WHERE `id` = :id" );
    $keys = array_keys($data);
    $str_keys = implode(", ", $keys);
    $request = $this->pdo->prepare("UPDATE $table SET `name` = :name, `email` = :email WHERE `id` = :id" );
    $data_merge = array_merge($data, ['id' => $id]);
    $request->execute($data_merge);
  }

  function delete($table, $id){
    var_dump($id); die;
    $request = $this->pdo->prepare("DELETE FROM $table WHERE `id` = :id" );
    $request->execute(['id' => $id]);
  }

}