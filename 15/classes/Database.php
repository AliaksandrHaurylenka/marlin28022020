<?php

class Database{
  private static $instance = null;
  private $pdo, $query, $error = false, $results, $count;

  private function __construct(){
    try {
      $this->pdo = new PDO
      (
        "mysql:host=".Config::get('mysql.host').
        ";dbname=".Config::get('mysql.dbname').
        ";charset=utf8", 
        Config::get('mysql.username'), 
        Config::get('mysql.password')
      );
      // var_dump($this->pdo);
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

  function query($sql, $params = []){
    $this->error = false;
    $this->query = $this->pdo->prepare($sql);

    if(count($params)){
      $i = 1;
      foreach($params as $param){
        $this->query->bindValue($i, $param);
        $i++;
      }
    }

    if(!$this->query->execute()){
      $this->error = true;
    }else{
      $this->results = $this->query->fetchAll(PDO::FETCH_OBJ);
      $this->count = $this->query->rowCount();
    }    

    return $this;
  }

  public function action($action, $table, $where = []){
    if(count($where) === 3){

      $operators = ['=', '<', '>', '>=', '<='];

      $field = $where[0];
      $operator = $where[1];
      $value = $where[2];

      if(in_array($operator, $operators)){
        $sql = "{$action} FROM {$table} WHERE {$field} {$operator} ?";
        if(!$this->query($sql, [$value])->error()){
          return $this;
        }
      }
    }
    elseif (count($where) === 0) {
      $sql = "{$action} FROM {$table}";
      if(!$this->query($sql)->error()){
        return $this;
      }
    }
    return false;
  }

  public function get($table, $where = []){
    return $this->action('SELECT *', $table, $where);
  }

  public function delete($table, $where = []){
    return $this->action('DELETE', $table, $where);
  }

  public function insert($table, $fields = []){
    //вытягиваем ключи массива
    $keys = array_keys($fields);
    //объединяем в строку ключи массива через запятую
    $str_keys = "`".implode("`, `", $keys)."`";
    // var_dump($str_keys); die;
    $val = "";
    foreach($fields as $field){
      $val .= "?,";
    }
    $val = rtrim($val, ',');
    // var_dump($val); die;

    $sql = "INSERT INTO $table ($str_keys) VALUES ($val)";
    // var_dump($sql); die;

    if(!$this->query($sql, $fields)->error()){
      return true;
    }

    return false;
  }

  public function first(){
    return $this->results()[0];
  }

  public function update($table, $id, $fields = []){

    $set = '';
    foreach($fields as $key => $field){
      $set .= "{$key} = ?,";
    }
    $set = rtrim($set, ',');
    // var_dump($set); die;

    $sql = "UPDATE {$table} SET {$set} WHERE id = {$id}";
    // var_dump($sql); die;

    if(!$this->query($sql, $fields)->error()){
      return true;
    }

    return false;
  }


}