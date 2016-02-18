<?php

class commandInterpreter {
	private $interactionObject = null;

	public function __construct($intObject, $comList){
		//takes the interaction object &
		//the command list from settings.php
		$this->interactionObject = $intObject;
		$this->commandList = $comList;
	}

	//which command did the user input? use...with..., take, attack, etc
	public function sliceInput($userInput, $outputString = null){
		//turns input into array using regex of doom
		//"^(.*?)(?:\s+|$)(?:(.*?)\s+(.*?)\s+(.*?)$|$)/i"

		$list1 = "";
		$list2 = "";

		foreach($this->commandList["part1"] as $handle){
			$list1 .= $handle;
			$list1 .= "|";
		}
		$handle = null;

		foreach($this->commandList["part2"] as $key => $handle){
			if($this->commandList["part1"][$key] == $key){ //this if statement is a bit dodgy rn
				$list2 .= $handle;
				$list2 .= "|";
				echo "\n SAUSAGES: ".$this->commandList["part1"][$key]."\n ".$key." ..END"
			} else {
				$list2 = "invalid;";
			}

		}
		$handle = null;

		$list1 = preg_replace("/^(.*)\|$/i", "$1", $list1);
		$list2 = preg_replace("/^(.*)\|$/i", "$1", $list2);

		echo "\n".$list1."\n";
		echo $list2."\n";

		preg_match("/^(".$list1.")(?:\s+|$)(?:(.*?)\s+(".$list2.")\s+(.*?)$|$)/i", $userInput, $outputArray);

		$command1 = "invalid";
		$command2 = "invalid";

		foreach ($this->commandList["part1"] as $handle){
			if (isset($outputArray[1])){
				if ($handle == $outputArray[1]){
					$command1 = $handle;
				}
			}
		}

		foreach ($this->commandList["part2"] as $handle){
			if (isset($outputArray[3])){
				if ($handle == $outputArray[3]){
					$command2 = $handle;
				}
			}
		}

		echo "\n SLICE: ".$command1." ".$command2."\n";

		return $outputArray;

	}

	public function whichCommand($commandArray){
		//which command is the user trying to use?
		//this function takes the array created by sliceInput

		$command1 = "?";
		$parameter1 = "?";
		$command2 = "?";
		$parameter2 = "?";
		if(isset($commandArray[1])){
			echo "command1 exists";
			$command1 = "exists";
			foreach ($this->commandList["part1"] as $key => $handle){
				if ($commandArray[1] == $handle){
					$command1 = "valid";
					echo "\ncommand1 is ".$commandArray[1]." ".$handle;
				}
			}
			$key = null; $handle = null;
		}
	
		if(isset($commandArray[2])){
			$parameter1 = "exists";
			echo "\n parameter 1 exists and is ".$commandArray[2];
		}
	

		if(isset($commandArray[3])){
			echo "\n command2 exists";
			$command2 = "exists";
			foreach ($this->commandList["part2"] as $key => $handle){
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