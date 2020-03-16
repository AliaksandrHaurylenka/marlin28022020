<?php

class Config{
  public static function get($path = null){
    if($path){
      $config = $GLOBALS['config'];
      // var_dump($config); die;
      // var_dump($path); die;
      $path = explode('.', $path);
      // var_dump($path); die;

      foreach($path as $item){
        if(isset($config[$item])){
          $config = $config[$item];
        }
      }

      return $config;
    }

    return false;
  }
}