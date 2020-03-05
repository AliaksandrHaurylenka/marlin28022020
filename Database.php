<?php

class Database{

  public $dbname;
  public $user;
  public $pass;
  // public $pdo;

  public function __construct($dbname, $user, $pass)
  {
    $this->dbname = $dbname;
    $this->user = $user;
    $this->pass = $pass;
  }

  function includeDB(){
    $pdo = new PDO("mysql:host=localhost; dbname=$this->dbname; charset=utf8", "$this->user", "$this->pass");
    return $pdo;
  }
    
  function getAll($table){
    $pdo = $this->includeDB();
    $request = $pdo->prepare("SELECT * FROM $table");
    $request->execute();
    $request = $request->fetchAll(2);
    return $request;
  }

  function getOne($table, $id){

  }

  function insert($table, $data){

  }

  function update($table, $data, $id){

  }

  function delete($table, $id){

  }

}