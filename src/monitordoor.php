<meta http-equiv="refresh" content="2">
<?php
/*if(isset($_POST["bid"])&&isset($_POST["rid"])&&isset($_POST["did"]))
{
require("dbconnector.php");
require("functions.php");

}*/
?>

<html>
	<title>Building Automation Systems</title>
	<head>
		<link rel="stylesheet" href="style.css" />
		<script type="text/javascript" src="jquery.js" /></script>
		<script type="text/javascript" src="functions.js" /></script>
		<link rel="stylesheet" href="switch/style.css">
		<u><h1>Door Sensing</h1></u>
	</head>
	
	<body>
		<div class="encloser">
			
			<div class="lpanel">
				<?php
					exec("sudo RF24RaspberryCommunicator/remote -m 10 2>&1",$output,$ret);
					//var_dump($output);
					//var_dump($ret);
					$op=str_replace(1,"DOOR CLOSED",$output[25]);
					$op=str_replace(2,"DOOR OPEN",$op);
					echo $op;
				?>
			</div>
			
			<div class="rpanel">
				BAS MAP
			</div>
			
			<div class="eline">
			</div>
		</div>
	</body>
</html>
