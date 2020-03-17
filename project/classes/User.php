<?php

class User {
  private $db;

  public function __construct(){
    $this->db = Database::getInstance();
  }

  public function get($table){
    return $this->db->get($table)->results();
  }

  public function getOne($table, $where = []){
    return $this->db->get($table, $where)->first();
  }

  public function create($table, $fields = []){
    $this->db->insert($table, $fields);
  }

  public function update($table, $id, $fields = []){
    $this->db->update($table, $id, $fields);
  }

  public function delete($table, $where = []){
    $this->db->delete($table, $where);
  }

}