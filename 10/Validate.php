<?php

class Validate{

  private $passed = false, $errors = [], $db = null;

  public function __construct(){
    $this->db = Database::getInstance();
  }

  public function check($source, $items = []){
    foreach($items as $item => $rules){
      foreach($rules as $rule_value){

        $value = $source[$item];
      }
    }
  }

  public function addError($error){
    $this->errors[] = $error;
  }

  public function errors(){
    return $this->errors;
  }

  public function passed(){
    return $this->passed;
  }
}