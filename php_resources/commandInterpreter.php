<?php

class commandInterpreter {
	private $interactionObject = null;

	public function __construct($object){
		$this->interactionObject = $object;
	}

	//which command did the user input? use...with..., take, attack, etc
	public function sliceInput(
		$userInput, $outputString = null){

		preg_match("/^(.*?)(?:\s+|$)(.*?)(?:\s+(.*?)\s+(.*?)$|$)/i", $userInput, $outputArray);

		return $outputArray;

	}

	public function whichCommand($commandArray){
		$commandList["part1"]["use"] = "use";
		$commandList["part2"]["use"] = "with";

		$command1 = "?";
		$parameter1 = "?";
		$command2 = "?";
		$parameter2 = "?";
		if(isset($commandArray[1])){
			echo "command1 exists";
			$command1 = "exists";
			foreach ($commandList["part1"] as $key => $handle){
				if ($commandArray[1] == $handle){
					$command1 = "valid";
					echo "\ncommand1 is ".$commandArray[1]." ".$handle;
				}
			}
			$key = null; $handle = null;
		}
	
		if($commandArray[2]){
			$parameter1 = "exists";
			echo "\n parameter 1 exists and is ".$commandArray[2];
		}
	

		if(isset($commandArray[3])){
			echo "\n command2 exists";
			$command2 = "exists";
			foreach ($commandList["part2"] as $key => $handle){
				if ($commandArray[3] == $handle){
					$command2 = "valid";
					echo "\n command2 is ".$commandArray[3]." ".$handle;
				}
			}
			$key = null; $handle = null;
		}

		if(isset($commandArray[4])){
			$parameter2 = "exists";
			echo "\n parameter 2 exists and is ".$commandArray[4];
		}

		if($command1 == "valid"  &&
			$parameter1 == "exists" &&
			$command2 == "valid" &&
			$parameter2 == "exists"){
			//valid 2 part command (must have 2 parameters)
			echo "\n this is a valid 2 part command";
		}

		if($command1 == "valid"  &&
				$parameter1 == "exists" &&
				$command2 != "valid"){
			//valid 1 part command with a parameter
			echo "\n this is a valid 1 part command with a parameter";
		}

		if($command1 == "valid" &&
			$parameter1 != "exists" &&
			$command2 != "valid"){
			//valid 1 part command with no parameter, e.g. "look"
			echo "this is a valid 1 part command with no parameter";
		}

	}
}

?>