<?php
class character {
	private $name = null;
	private $description = null;
	private $species = null;
	private $hp = null;
	private $itemsCarried = array(); //array of items as objects
	private $cli_interaction_object;

	public function __construct($cli_interaction_object, $name, $species = "Unknown creature.", $hp = 10, $itemsCarried = "Nothing.", $description = "You're not sure if anyone knows what this is."){
		$this->name = $name;
		$this->species = $species;
		$this->hp = $hp;
		$this->itemsCarried = $itemsCarried;
		$this->description = $description;
		$this->cli_interaction_object = $cli_interaction_object;
	}


	
	public function say($speech_string) {
		return $this->cli_interaction_object->out($this->name.": ". $speech_string);
	}

	public function ask($speech_string){
		return $this->cli_interaction_object->out($this->name.": ". $speech_string, "p");
	}

	public function getVar($varName){
		return $this->{$varName};
	}

	public function updateVar($varName, $newVal){
		if ($varName == "name" ||
			$varName == "descrpition"||
			$varname == "speices"||
			$varName == "hp" ||
			$varName == "itemsCarried"){

			$this->{$varName} = $newVal;

			return true;
		}else{
			return false;
		}
	}
}

?>
