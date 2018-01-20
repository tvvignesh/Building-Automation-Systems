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
		<u><h1>Monitor Temperature</h1></u>
	</head>
	
	<body>
		<div class="encloser">
			
			<div class="lpanel">
				<?php
					exec("sudo RF24RaspberryCommunicator/remote -m 1 2>&1",$output,$ret);
					//var_dump($output);
					//var_dump($ret);
					echo $output[25];
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
