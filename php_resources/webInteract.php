<?php

class webInteract {
	private $form = '<html><head></head><body>
	<form action="index.php" method="post">
 		<p> <input type="text" name="input"/> </p>
 		<p> <input type="submit" value="Go"/> </p>
 	</form>
 	</body></html>';

	public function inp(){
		echo $this->form;
		if ($_POST["input"]){
			$line = $_POST["input"];
		return $line;
		}
		exit();
	}

	public function out($string = "Lol, what?", $type = "n", $br = 1){
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
				//echo $this->form;
				//echo $brString."> ";
				return $this->inp(); //TESTED - this retuns the input string
				//break;
		}
	}
}

?>
