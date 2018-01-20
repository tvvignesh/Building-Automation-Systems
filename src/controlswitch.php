<?php
if(isset($_POST["bid"])&&isset($_POST["rid"])&&isset($_POST["did"]))
{
require("dbconnector.php");
require("functions.php");
$bid=$_POST["bid"];
$rid=$_POST["rid"];
$did=$_POST["did"];
if(isset($_POST["switch"]))
{
	$status=1;
	if($bid=="8dffb246d998b6b"&&$rid=="654073bb3ef58ff"&&$did=="e7fa867fc97a")
	{
		exec("sudo RF24RaspberryCommunicator/remote -m 31 2>&1");
	}
	else
	if($bid=="8dffb246d998b6b"&&$rid=="654073bb3ef58ff"&&$did=="b8ef8f941e1fc4b")
	{
		exec("sudo RF24RaspberryCommunicator/remote -m 32 2>&1");
	
	}
}
else
{
	$status=2;
	if($bid=="8dffb246d998b6b"&&$rid=="654073bb3ef58ff"&&$did=="e7fa867fc97a")
	{
		exec("sudo RF24RaspberryCommunicator/remote -m 41 2>&1");
	}
	else
	if($bid=="8dffb246d998b6b"&&$rid=="654073bb3ef58ff"&&$did=="b8ef8f941e1fc4b")
	{
		exec("sudo RF24RaspberryCommunicator/remote -m 42 2>&1");
	
	}
}
	$query="UPDATE b_device_info SET dsstatus='$status' WHERE did='$did'";
	if (!$db->query($query))
	{
		$errmsg=$db->error;
		$errno=$db->errno;
		die("OOPS! Error!".$errmsg.$errno);
	}
	else
	{
		echo "<script type='text/javascript'>alert(\"DEVICE SUCCESSFULLY SWITCHED\");window.location.assign(\"/bas\")</script>";
	}
}
?>

<html>
	<title>Building Automation Systems</title>
	<head>
		<link rel="stylesheet" href="style.css" />
		<script type="text/javascript" src="jquery.js" /></script>
		<script type="text/javascript" src="functions.js" /></script>
		<script src="switch/jquery/iphone-style-checkboxes.js"></script>
		<link rel="stylesheet" href="switch/style.css">
		<u><h1>Switch a Device</h1></u>
	</head>
	
	<body>
		<div class="encloser">
			
			<div class="lpanel">
				<form action="controlswitch.php" method="post" name="controlswitch" id="controlswitch">
				Select the Building where the Device belongs: 
				<select name="bid" id="buildingid" onchange="loadrooms1();">
				<?php
				require("dbconnector.php");
				require("functions.php");
					$query="SELECT * FROM b_building_info";
					$res=dbquery($query);
					$len=count($res);
					for($i=0;$i<$len;$i++)
					{
						$row=$res[$i];
						$bid1=$row["bid"];
						$bname1=$row["bname"];
						echo '<option value="'.$bid1.'">'.$bname1.'</option>';
					}
					
				?>
				</select>
				<br><br>
				<div id="roomloader"></div>
				<br>
				<div id="deviceloader"></div>
				<br>
				<div id="switchloader"></div>
				<input type="submit" value="Switch" class="btns">
				
				</form>
			</div>
			
			<div class="rpanel">
				BAS MAP
			</div>
			
			<div class="eline">
			</div>
		</div>
	</body>
</html>
