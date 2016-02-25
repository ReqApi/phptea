<?php
//SETTINGS FOR PHPTeA

//use
$settings["commandList"]["use"]["alias"][] = "use";
$settings["commandList"]["use"]["alias"][] = "combine";

$settings["commandList"]["use"]["part2"][] = "with";

//look at
$settings["commandList"]["look at"]["alias"][] = "look at";
$settings["commandList"]["look at"]["part2"][] = "examine";

//eat
$settings["commandList"]["eat"]["alias"][] = "eat";

//drink
$settings["commandList"]["drink"]["alias"][] = "drink";

//open
$settings["commandList"]["open"]["alias"][] = "open";
$settings["commandList"]["open"]["part2"][] = "with";

//close
$settings["commandList"]["close"]["alias"][] = "close";
$settings["commandList"]["close"]["part2"][] = "with";

//unlock
$settings["commandList"]["unlock"]["alias"][] = "unlock";
$settings["commandList"]["unlock"]["part2"][] = "with";

//lock
$settings["commandList"]["lock"]["alias"][] = "lock";
$settings["commandList"]["lock"]["part2"][] = "with";

//walk to
$settings["commandList"]["walk"]["alias"][] = "walk to";
$settings["commandList"]["walk"]["alias"][] = "go to";
$settings["commandList"]["walk"]["alias"][] = "move to";
$settings["commandList"]["walk"]["alias"][] = "travel to";
$settings["commandList"]["walk"]["alias"][] = "walk";
$settings["commandList"]["walk"]["alias"][] = "go";
$settings["commandList"]["walk"]["alias"][] = "move";
$settings["commandList"]["walk"]["alias"][] = "travel";

//attack
$settings["commandList"]["attack"]["alias"][] = "attack";
$settings["commandList"]["attack"]["alias"][] = "kick";

$settings["commandList"]["attack"]["part2"][] = "with";

print_r($settings["commandList"]);


$list1 = "";

foreach($settings["commandList"] as $handle => $content){
	foreach($settings["commandList"][$handle]["alias"] as $alias){
	$list1 .= $alias;
	$list1 .= "|";
	}
	
}
$list1=substr($list1,0,strlen($list1)-1);

echo $list1;

?>