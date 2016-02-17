<?php

$handle = fopen("php://stdin", "r");


function inp(){
	global $handle;
	$line = trim(fgets($handle));
	return $line;
}

	
function isinp($info = array(

	"prompt" => "this is a prompt",
		"q" => array(
			array(
				"bounce",
				"jump",
				"hop"),
			array(
				"walk",
				"stroll",
				"ambulate",)),
	"outcome" => array(
		0 => "fail",
		1 => "success A",
		2 => "success B"))){

$option = 0;
$failure = $info["outcome"][$option];
$output = $info["outcome"][$option];

	while ($output == $failure) {


		sleep(2);


		echo $info["prompt"] . "\n";

		$inpstring = inp(); //retrieve user input and put it in variable

		foreach($info["q"] as $key => $action){
			foreach ($action as $word){
				if(stristr($inpstring, $word)) {
					sleep(2);
					//$option = $action + 1;
					$output = $info["outcome"][$key + 1];
					// . "\n";
					break(1);
				}
			}
		}

		if($output == $failure){
			sleep(1);
			echo $output . "\n";
		}

	}
	sleep(1);
	echo $output . "\n";

	//print_r($info["q"]);
}

isinp(array(
	"prompt" => "You walk into a room. In the room is a table. On the table is a loaf of BREAD.",
	"q" => array(array("eat","bread"), array("leave", "exit"),array("knife", "cut", "chop", "slice")),
	"outcome" => array(0 => "NONSENSE", 1 => "You eat the bread. OMNOMNOM", "You fuck RIGHT OFF. You have no interest in this silly room.", "You realise there is a bread knife! Such fun! You carefully slice the bread and eat it. OM TO THE NOM TO THE NOM. Yes. Good.")));

isinp(array(
	"prompt" => "Having enjoyed the delicious bread, you look around you. There is a cat under the table.",
	"q" => array(array("pet", "stroke", "touch", "play"),array("eat", "kick"), array("leave", "exit")),
	"outcome" => array(0 => "NONSENSE", 1 => "You pet the cat. The cat is happy. You wish that for you, happiness was so simple.", "You monster.", "Oh fine. I didn't want you to play this game anyway.")));

/*isinp(array(
	"prompt" => "The cat is a magic cat. You can tell this because of its pointy purple hat with stars on it. Magic cats, as everybody knows, can talk. \n \n CAT: Hello oddly hairless one. What is your name?",
	"q" => array(array(),array("eat", "kick"), array("leave", "exit")),
	"outcome" => array(0 => "NONSENSE", 1 => "You pet the cat. The cat is happy. You wish that for you, happiness was so simple.", "You monster.", "Oh fine. I didn't want you to play this game anyway.")));
*/
sleep (2);
echo "The cat is a magic cat. You can tell this because of its pointy purple hat with stars on it. Magic cats, as everybody knows, can talk. \n \n";
sleep(2);
echo "CAT: Hello oddly hairless one. What is your name? \n \n";

$player = inp();

sleep(2);

echo "\n \nHello, " . $player . ". This is the end of the game! I no longer exist! Goodbye!";

?>

