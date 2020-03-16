<?php

class Users {
  private $db;

  public function __construct(){
    $this->db = Database::getInstance();
  }

  public function create($fields = []){
    $this->db->insert('users', $fields);
  }

  public function get($table){
    return $this->db->get($table)->results();
    // var_dump($this->db->get($table)->results()); die;
  }

  public function getOne($table, $where = []){
    return $this->db->get($table, $where)->first();
    // var_dump($this->db->get($table)->results()); die;
  }

}