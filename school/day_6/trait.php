<?php
trait Logger {
  public function log($message){
    echo "[LOG]:" . $message . "<br>";
  }
}
//define timestamp
trait Timestamp{
  public function Timestamp($day,$minute,$second){
    echo "" .$day . ":" .$minute . ":" .$second;
  }
}
class Car {
  use Logger , Timestamp;
  public function __construct($name)
  {
    $this->$name=$name;
  }
}
$car = new Car($yanouk);
$car->log("not working");
