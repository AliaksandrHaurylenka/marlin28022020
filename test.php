<?php

class Car {
  private $color;
  public $year;
  public $brend;

  public function __construct($color, $year, $brend)
  {
    $this->color = $color;
    $this->year = $year;
    $this->brend = $brend;
  }

  public function cheingeColor($color){
    $this->color = $color;
  }

  public function displayColor(){
    return $this->color;
  }
  
}

$car1 = new Car('red', 2015, 'BMW');
// var_dump($car1->color = 'blue');
// echo $car1->color = 'blue';
// var_dump($car1);
$car1->cheingeColor('blue');
echo $car1->displayColor();