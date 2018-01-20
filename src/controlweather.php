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
}
else
{
	$status=2;
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
		echo "<script type='text/javascript'>alert(\"DEVICE SUCCESSFULLY SWITCHED\");window.location.assign(\"http://localhost/bas\")</script>";
	}
}
?>

<html>
	<title>Building Automation Systems</title>
	<head>
		<link rel="stylesheet" href="style.css" />
		<link rel="stylesheet" href="jquery-ui-1.11.4.custom/jquery-ui.css">
		<script type="text/javascript" src="jquery.js" /></script>
		<script src="jquery-ui-1.11.4.custom/jquery-ui.js"></script>
		<script type="text/javascript" src="functions.js" /></script>
		<script src="switch/jquery/iphone-style-checkboxes.js"></script>
		<link rel="stylesheet" href="switch/style.css">
		<u><h1>Control Weather</h1></u>
		
		
	</head>
	
	<body>
		<div class="encloser">
			
			<div class="lpanel">
					Select the building for which weather is to be controlled: 
					<select name="bid" id="buildingid" onchange="loadtempcont();">
					<?php
					echo '<option value="">Select an option</option>';
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
					
					<div id="temperaturecontainer">
					</div>
					
			<div id="emptempcont"></div>	
			</div>
			
			<div class="rpanel">
				BAS MAP
			</div>
			
			<div class="eline">
			</div>
		</div>
	</body>
</html>
