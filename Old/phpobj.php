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
				return $this->inp();
				//break;
		}
	}

	//public function

}

class chk extends cli {
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

		$option = 0;
		$failure = $outcome[$option]; 
		$output = $outcome[$option];
		$returnVal = "";

			while ($output == $failure) {


				//echo $info["prompt"] . "\n";

				$inpString = $this->out($prompt, "p"); //retrieve user input and put it in variable
				//echo $impstring;
				foreach($q as $key => $action){
					foreach ($action as $word){
						if(stristr($inpString, $word)) {
							//$option = $action + 1;
							$output = $outcome[$key + 1];
							// . "\n";
							break(1);
						}
					}
				}

				if($output == $failure){
					$this->out($output);
					return $inpString;
				}

			}
			$this->out($output);
			return $inpString;
	}
}

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

class player extends character {

}


$cli = new cli();
$chk = new chk();
$knettenba = new character($cli, "CAT", "Cat", 22, "Bugger all.");

$knettenba->ask("I SPEeAAK. MROWL.");

$knettenba->say("Hello, my name is ".$knettenba->getVar("name").".");

$knettenba->updateVar("name", "TWAT");

$knettenba->say("Hello, my name is ".$knettenba->getVar("name").".");

//cho $cli->out("", "p");



$chk->inpContains("What are birds?", array(array("We just don't know", "don't know,", "I don't know")), array("BOLLOCKS!", "We just don't know."));


$chk->inpContains(
	"You walk into x room. In the room is a table. On the table is a loaf of BREAD.",
	array(array("eat","bread"), array("leave", "exit"),array("knife", "cut", "chop", "slice")),
	array(0 => "NONSENSE", 1 => "You eat the bread. OMNOMNOM", "You fuck RIGHT OFF. You have no interest in this silly room.", "You realise kthere is a bread knife! Such fun! You carefully slice the bread and eat it. OM TO THE NOM TO THE NOM. Yes. Good."));

$chk->inpContains(
	"Having enjoyed the delicious bread, you look around you. There is a cat under the table.",
	array(array("pet", "stroke", "touch", "play"),array("eat", "kick"), array("leave", "exit")),
	array(0 => "NONSENSE", 1 => "You pet the cat. The cat is happy. You wish that for you, happiness was so simple.", "You monster.", "Oh fine. I didn't want you to play this game anyway."));

$cli->out("The cat is a magic cat. You can tell this because of its pointy purple hat with stars on it. Magic cats, as everybody knows, can talk.");


$x = true;
$name = $knettenba->ask("Hello oddly hairless one. What is your name?", "p");
while($x){
	if(stristr($name, " ")){
		$name=$knettenba->ask("Nobody should have more than one name. That's just pretentious! \n What's your name?", "p");
	}elseif($name == null || $name == ""){
		$name=$knettenba->ask("I said, what is your name?! That's not a name, that's nothing!", "p");
	}else{
		$x=false;
	}
} 

$player = new player($cli, $name);

$cli->out("Hello ".$player->name."! That's a silly name but I guess it will do...");


/*
if($guyHairCut = "short"){
	echo "Awwww. It looked nicer before.";
}elseif($womanOrNBHaircut = "short"){
	echo "Yes. This. More of this please.";
}
*/


?>