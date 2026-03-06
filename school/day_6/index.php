<?php

// OOP
abstract class vehicle
{
    public $brand;

    public $name;

    public $year;

    public $gas_type;

    public function __construct($brand, $name, $year, $gas_type)
    {
        $this->$brand = $brand;
        $this->$name = $name;
        $this->$year = $year;
        $this->$gas_type = $gas_type;
    }

    public function getCarDetail() {}
}
class car extends vehicle
{
    public $model;

    public function __construct($brand, $name, $year, $gas_type, $model)
    {

        $this->$brand = $brand;
        $this->$name = $name;
        $this->$year = $year;
        $this->$gas_type = $gas_type;
        $this->$model = $model;

    }
    /* public function getCarDetail(){ */
    /*   return parent::getCarDetail() . "gas type: $this->$gas_type"; */
    /* } */
}
abstract class name {}
interface Fuel
{
    public function getGasType();
}
class moto extends vehicle implements Fuel
{
    private $fuel;

    public function __construct($brand, $name, $year, $fuel)
    {
        parent::__construct($brand, $name, $year);
        $this->$fuel = $fuel;
    }

    public function getGasType()
    {
        return 'gas type is:'.$this->fuel;
    }
}
