<?php

class cli {

	private $handle = null;
	private $line = null;

	public function __construct() {
		$this->handle = fopen("php://stdin", "r");
		$this->line = "";
	}

	public function inp(){
		$line = trim(fgets($this->handle));
		return $line;
	}

	public function out($string = "Lol, what?", $type = "n", $br = 1){
		sleep(1.7);

		$brString = "";

		while($br > 0){
			$brString .= "\n";
			$br--;
		}
		switch($type) {
			case "n": //normal output
				echo $brString.$string.$brString;
				break;
			case "p": //prompt output
			if ($string != ""){ // if no output, ignore
				echo $brString.$string.$brString;
			}
				echo $brString."> ";
				return $this->inp(); //TESTED - this retuns the input string
				//break;
		}
	}

	//public function

}?>