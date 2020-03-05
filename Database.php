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

  function update($table, $data, $id){
    //получаем ключи массива вводимых данных
    $keys = array_keys($data);
    //ф-я callback для преобразования массива к нужному виду. Напр. `name` = :name, `email` = :email
    function a ($keys){
      return $keys." = :".$keys;
    }
    //преобразование массива
    $b = array_map('a', $keys);
    //объеденение массива в строку
    $str_keys = implode(", ", $b);

    $request = $this->pdo->prepare("UPDATE $table SET $str_keys WHERE `id` = :id" );
    $data_merge = array_merge($data, ['id' => $id]);
    $request->execute($data_merge);
  }

  function delete($table, $id){
    $request = $this->pdo->prepare("DELETE FROM $table WHERE `id` = :id" );
    $request->execute(['id' => $id]);
  }

}