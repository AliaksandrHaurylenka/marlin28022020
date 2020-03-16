<?php

class Users {
  private $db;

  public function __construct(){
    $this->db = Database::getInstance();
  }

  public function create($table, $fields = []){
    $this->db->insert($table, $fields);
  }

  public function get($table){
    return $this->db->get($table)->results();
  }

  public function getOne($table, $where = []){
    return $this->db->get($table, $where)->first();
  }

}