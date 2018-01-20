<?php
if(isset($_POST["bid"])&&isset($_POST["pid"])&&isset($_POST["bid"])&&isset($_POST["did"]))
{
require("dbconnector.php");
require("functions.php");
$bid=$_POST["bid"];
$did=$_POST["did"];
$pid=$_POST["pid"];

	$query="INSERT INTO b_device_paramrel (bid,did,paramid) VALUES ('$bid','$did','$pid')";
	if (!$db->query($query))
	{
		$errmsg=$db->error;
		$errno=$db->errno;
		die("OOPS! Error!".$errmsg.$errno);
	}
	else
	{
		echo "<script type='text/javascript'>alert(\"PARAMETER SUCCESSFULLY ATTACHED\");window.location.assign(\"http://localhost/bas\")</script>";
	}
}
?>

<html>
	<title>Building Automation Systems</title>
	<head>
		<link rel="stylesheet" href="style.css" />
		<script type="text/javascript" src="jquery.js" /></script>
		<script type="text/javascript" src="functions.js" /></script>
		<u><h1>Attach a Parameter</h1></u>
	</head>
	
	<body>
		<div class="encloser">
			
			<div class="lpanel">
				<form action="attachparam.php" method="post" name="attachparam" id="attachparam">
				Select the Building where the Device belongs: 
				<select name="bid" onchange="loadrooms();" id="buildingid">
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
				
				
				<br>
				<input type="submit" value="Attach Parameter" class="btns">
				<br>
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