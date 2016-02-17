<?php

//don't you fucking dare touch this code it works don't knock it I don't know why but it definitely works exactly like this
class chk {
	private $interactionObject = null;

	public function __construct($object){
		$this->interactionObject = $object;

	}

	public function inpContains(
		$prompt = "this is a prompt",
		$q = array( 
			array(
				"bounce",
				"jump",
				"hop"),
			array(
				"walk",
				"stroll",
				"ambulate",)),
	$outcome = array(
		-1 => "failure",
		0 => "invalid",
		1 => "success A",
		2 => "success B")){

		$output = array("outputKey" => 0, "outputResult" => $outcome[0], "outputString" => 0);

		while ($output["outputKey"] == 0 ){
			$inpString = $this->interactionObject->out($prompt, "p"); //retrieve user input and put it in variable
					//echo $impstring;
			foreach($q as $key => $action){
				foreach ($action as $word){
					if(stristr($inpString, $word)) {
						//$optio]n = $action + 1;
						$output["outputString"] = $inpString;
						$output["outputKey"] = $key;
						$output["outputResult"] = $outcome[$key];

					} else {
						//$output["outputKey"] = 0;
						$output["outputString"] = $inpString;
						$output["outputResult"] = $outcome[$output["outputKey"]];
						
					}
				}
			}
			$this->interactionObject->out($output["outputResult"]);

		}			

		return $output;

	}
}

?>
