<?php

require "php_resources/character.php";
require "php_resources/chk.php";
require "php_resources/cli.php";
require "php_resources/player.php";
require "php_resources/webInteract.php";
require "php_resources/commandInterpreter.php";

//require "vendor/autoload.php"

$cli = new cli();
//$cli = new cli();
$chk = new chk($cli);
$commandInterpreter = new commandInterpreter($cli);
$knettenba = new character($cli, "CAT", "Cat", 22, "Bugger all.");

$arraything = $commandInterpreter->sliceInput($cli->out("You have a spanner, there is a nut.", "p"));
$commandInterpreter->whichCommand($arraything);
$arraything = $commandInterpreter->sliceInput($cli->out("You have a spanner, there is a nut.", "p"));
$commandInterpreter->whichCommand($arraything);
$arraything = $commandInterpreter->sliceInput($cli->out("You have a spanner, there is a nut.", "p"));
$commandInterpreter->whichCommand($arraything);
$arraything = $commandInterpreter->sliceInput($cli->out("You have a spanner, there is a nut.", "p"));
$commandInterpreter->whichCommand($arraything);
$arraything = $commandInterpreter->sliceInput($cli->out("You have a spanner, there is a nut.", "p"));
$commandInterpreter->whichCommand($arraything);
/*
$flibble = $knettenba->ask("I SPEeAAK. MROWL.");
echo $flibble;



$knettenba->say("Hello, my name is ".$knettenba->getVar("name").".");



$knettenba->say("Hello, my name is ".$knettenba->getVar("name").".");

//cho $cli->out("", "p");


*/

$chk->inpContains("What are birds?", array(1 => array("We just don't know", "don't know,", "I don't know")), array("BOLLOCKS!", "We just don't know."))
["outputKey"]

;
exit();
/*

$chk->inpContains(
	"You walk into x room. In the room is a table. On the table is a loaf of BREAD.",
	array(array("eat","bread"), array("leave", "exit"),array("knife", "cut", "chop", "slice"))
	array(0 => "NONSENSE", 1 => "You eat the bread. OMNOMNOM", "You fuck RIGHT OFF. You have no interest in this silly room.", "You realise kthere is a bread knife! Such fun! You carefully slice the bread and eat it. OM TO THE NOM TO THE NOM. Yes. Good."));
*/
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

$cli->out("Hello ".$player->getVar("name")."! That's a silly name but I guess it will do...");


/*
if($guyHairCut = "short"){
	echo "Awwww. It looked nicer before.";
}elseif($womanOrNBHaircut = "short"){
	echo "Yes. This. More of this please.";
}
*/


?>