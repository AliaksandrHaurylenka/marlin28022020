<?php

class Database{
  private static $instance = null;
  private $pdo, $query, $error = false, $results, $count;

  private function __construct(){
    try {
      $this->pdo = new PDO("mysql:host=localhost; dbname=marlin-oop; charset=utf8", "root", "");
    } catch (PDOException $exception) {
      die($exception->getMessage());
    }
  }

  public static function getInstance(){
    if(!isset(self::$instance)){
      self::$instance = new Database;
    }

    return self::$instance;
  }

  public function error()
  {
    return $this->error;
  }

  public function results(){
    return $this->results;
  }

  public function count(){
    return $this->count;
  }

  function query($sql){
    $this->error = false;
    $this->query = $this->pdo->prepare($sql);
    if(!$this->query->execute()){
      $this->error = true;
    }else{
      // $this->results = $this->query->fetchAll(PDO::FETCH_OBJ);
      $this->results = $this->query->fetchAll(2);
      $this->count = $this->query->rowCount();
    }    

    return $this;
  }

  public function getAll($table){
    return $this->query("SELECT * FROM $table");  
  }

  
}