<?php

class vehicle {
	public $type = null;
	public $make = null;
	public $model = null;
	public $year = null;
	public $durability = null;
	public $destroyed = false;

	public function __construct($type, $make, $model, $year, $durability){
		$this->type = $type;
		$this->make = $make;
		$this->model = $model;
		$this->year = $year;
		$this->durability = $durability;
	}

	public function getFullName(){
		return $this->year." ".$this->make." ".$this->model." ".$this->type;
	}

	public function destroy(){
		echo $this->getFullName()." destroyed! Ohnoes!\n";
		$this->destroyed = true;
	}

	public function damage(){
		$this->durability--;
		if($this->durability < 1){
			$this->destroy();
		}
	}

	public function doBattleWith($vehicle){
		if($this->durability > $vehicle->durability){
			$vehicle->destroy();
			$this->damage();
		}elseif($this->durability < $vehicle->durability){
			$this->destroy();
			$vehicle->damage();
		}else{
			$this->damage();
			$vehicle->damage();
		}
	}
} 

class tank extends vehicle {
	public function destroy(){
		echo "Are you fucking kidding, you can't destroy a tank!\n";
	}

	public function damage(){
		echo "Haha, but a scratch!\n";
	}
}

class superbus extends tank{
		public function destroy(){
		echo "This bus cannot be destroyed. It is protected by the feminists.\n";
	}

	public function damage(){
		echo "Don't damage this bus! That's transmisogyny!!!11\n";
	}
}


$car = new vehicle("car", "Ford", "Focus", 2013, 1);
$taxi = new vehicle("car", "Aquacars", "Portsmoothian Dream", 1972, 1);
$plane = new vehicle("plane", "Boeing", 747, 1998, 4);
$bus = new vehicle("bus", "Arriva", 101, 2013, 3);

$tank = new tank("tank", "US Military", "ugly thing", 1773, 2);
$dwc = new superbus("bus", "Social Justice Warriors", "Down With Cis", 2015, 99999999);

$bus->doBattleWith($car);
sleep(1);
$bus->doBattleWith($taxi);
sleep(1);
$plane->doBattleWith($bus);
sleep(1);
$plane->doBattleWith($tank);
sleep(1);
$plane->doBattleWith($tank);
sleep(1);
$plane->doBattleWith($tank);
sleep(1);
$plane->doBattleWith($tank);
while($dwc->durability > 1){
	$dwc->doBattleWith($tank);
	sleep(2);
}