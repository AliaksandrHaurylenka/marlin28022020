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
    $this->db->get($table);
  }

}