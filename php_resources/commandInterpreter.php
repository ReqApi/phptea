<?php

class commandInterpreter {
	private $localInteractionObject = null;
	private $localCommandList = null;

	public function __construct($interactionObject, $commandList){
		//takes the interaction object &
		//the command list from settings.php
		$this->LocalInteractionObject = $interactionObject;
		$this->localCommandList = $commandList;
	}

	//which command did the user input? use...with..., take, attack, etc
	public function sliceInput($userInput, $outputString = null){
		//turns input into array using regex of doom
		//"^(.*?)(?:\s+|$)(?:(.*?)\s+(.*?)\s+(.*?)$|(.*?)$|$)/i"

		$list1 = "";
		$list2 = "";

		foreach($this->localCommandList as $handle => $content){
			foreach($this->localCommandList[$handle]["alias"] as $alias){
			$list1 .= $alias;
			$list1 .= "|";
			}
		}
		//$list1=substr($list1,0,strlen($list1)-1); //trim final pipe (might not be necessary)
		$handle = null;

		foreach($this->localCommandList as $handle => $content){
			if(isset($this->localCommandList[$handle]["part2"])){
				foreach($this->localCommandList[$handle]["part2"] as $alias){
						$list2 .= $alias;
						$list2 .= "|";
				}
			}
		}

		//$list2=substr($list2,0,strlen($list2)-1); //trim final pipe
		$handle = null;


		$list1 = preg_replace("/^(.*)\|$/i", "$1", $list1);
		$list2 = preg_replace("/^(.*)\|$/i", "$1", $list2);

		echo "\n".$list1."\n";
		echo "\n".$list2."\n";

		preg_match("/^(".$list1.")(?:\s+|$)(?:(.*?)\s+(".$list2.")\s+(.*?)$|(.*?)$|$)/i", $userInput, $outputArray);
		$outputArray = array_values(array_filter($outputArray));
		print_r($outputArray);

		$command1 = "invalid";
		$command2 = "invalid";
/*
		foreach($this->localCommandList as $handle => $content){
			foreach($this->localCommandList[$handle]["alias"] as $alias){
				if (isset($outputArray[1])){
					if ($alias == $outputArray[1]){
						$command1 = $alias;
					}
				}
			}
		}

		foreach ($this->localCommandList["part2"] as $handle){
			if (isset($outputArray[3])){
				if ($handle == $outputArray[3]){
					$command2 = $handle;
				}
			}
		}
*/
		echo "\n SLICE: ".$command1." ".$command2."\n";

		print_r($outputArray);
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
			foreach($this->localCommandList as $handle => $content){
				foreach ($this->localCommandList[$handle]["alias"] as $alias){
					if ($commandArray[1] == $alias){
						$command1 = "valid";
						echo "\ncommand1 is ".$commandArray[1]." ".$handle;
						$command1handle = $handle;
					}
				}
			}
		}
	
		if(isset($commandArray[2])){
			$parameter1 = "exists";
			echo "\n parameter 1 exists and is ".$commandArray[2];
		}
	

		if(isset($commandArray[3])){
			echo "\n command2 exists";
			$command2 = "exists";
			/*
			foreach ($this->commandList["part2"] as $key => $handle){
				if ($commandArray[3] == $handle){
					$command2 = "valid";
					echo "\n command2 is ".$commandArray[3]." ".$handle;
				}
			}
			*/
				foreach ($this->localCommandList[$command1handle]["part2"] as $alias){
					if ($commandArray[3] == $alias){
						$command2 = "valid";
						echo "\ncommand2 is ".$commandArray[3]." ".$command1handle;
					}
				}
		}

		if(isset($commandArray[4])){
			$parameter2 = "exists";
			echo "\n parameter 2 exists and is ".$commandArray[4];
		}

		//defining the array that this function returns
		$returnArray["valid"] = false;
		$returnArray["parameterCount"] = null; //number of parameters found
		$returnArray["commandCount"] = null;  //number of command words found
		$returnArray["command"][1]["handle"] = null;
		$returnArray["command"][1]["alias"] = null;
		$returnArray["parameter"][1] =  null;
		$returnArray["command"][2]["alias"] = null;
		$returnArray["parameter"][2] = null;



		if($command1 == "valid"  &&
			$parameter1 == "exists" &&
			$command2 == "valid" &&
			$parameter2 == "exists"){
			//valid 2 part command (must have 2 parameters)
			echo "\n this is a valid 2 part command";

			$returnArray["valid"] = true;
			$returnArray["parameterCount"] = 2; //number of parameters found
			$returnArray["commandCount"] = 2;  //number of command words found
			$returnArray["command"][1]["handle"] = $command1handle;
			$returnArray["command"][1]["alias"] = $commandArray[1];
			$returnArray["parameter"][1] =  $commandArray[2];
			$returnArray["command"][2]["alias"] = $commandArray[3];
			$returnArray["parameter"][2] = $commandArray[4];
			print_r($returnArray);
			return $returnArray;

		}

		if($command1 == "valid"  &&
				$parameter1 == "exists" &&
				$command2 != "valid"){
			//valid 1 part command with a parameter
			echo "\n this is a valid 1 part command with a parameter";

			$returnArray["valid"] = true;
			$returnArray["parameterCount"] = 1; //number of parameters found
			$returnArray["commandCount"] = 1;  //number of command words found
			$returnArray["command"][1]["handle"] = $command1handle;
			$returnArray["command"][1]["alias"] = $commandArray[1];
			$returnArray["parameter"][1] =  $commandArray[2];
			$returnArray["command"][2]["alias"] = null;
			$returnArray["parameter"][2] = null;
			print_r($returnArray);
			return $returnArray;
		}

		if($command1 == "valid" &&
			$parameter1 != "exists" &&
			$command2 != "valid"){
			//valid 1 part command with no parameter, e.g. "look"
			echo "this is a valid 1 part command with no parameter";

			$returnArray["valid"] = true;
			$returnArray["parameterCount"] = 2; //number of parameters found
			$returnArray["commandCount"] = 0;  //number of command words found
			$returnArray["command"][1]["handle"] = $command1handle;
			$returnArray["command"][1]["alias"] = $commandArray[1];
			$returnArray["parameter"][1] =  null;
			$returnArray["command"][2]["alias"] = null;
			$returnArray["parameter"][2] = null;
			print_r($returnArray);
			return $returnArray;
		}
		print_r($returnArray);
	}

}

?>