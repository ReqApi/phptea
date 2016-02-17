<html>
 <head>
  <title>PHP Test</title>
 </head>
 <body>
 	<?php

 	$form = '<form action="index.php" method="post">
 		<p> <input type="text" name="input"/> </p>
 		<p> <input type="submit" value="Go"/> </p>
 	</form>';

 	echo $form;

 	if($_POST["input"]){
 		echo $_POST["input"];
 	}

 	

 	?>
 </body>
</html>