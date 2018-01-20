<?php
require("dbconnector.php");
require("functions.php");
$bid=$_GET["bid"];
$rid=$_GET["rid"];
echo 'Select the device to switch: <select name="did" id="did" onchange="switchload();">';
echo '<option value="">Select an option</option>';
	$query="SELECT * FROM b_device_info WHERE did IN (SELECT did FROM b_device_room WHERE bid='$bid' AND rid='$rid')";
	$res=dbquery($query);
	$len=count($res);
	for($i=0;$i<$len;$i++)
	{
		$row=$res[$i];
		$did1=$row["did"];
		$status=$row["dsstatus"];
		$dname1=$row["dname"];
		echo '<option value="'.$did1.'">'.$dname1.'</option>';
	}
echo '</select>';
?>
