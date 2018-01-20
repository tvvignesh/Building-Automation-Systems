<?php
require("dbconnector.php");
require("functions.php");
$bid=$_GET["bid"];
$rid=$_GET["rid"];
$light=$_GET["light"];
$query="UPDATE b_building_rooms SET lightlevel='$light' WHERE bid='$bid' AND rid='$rid'";
$msg=intval($light);
echo $msg;
$msg=500+$msg;
dbupdate($query);
if($bid=="8dffb246d998b6b"&&$rid=="654073bb3ef58ff")
{
	echo "<script type='text/javascript'>document.getElementById('msgbar').innerHTML='';</script>";
	exec("sudo RF24RaspberryCommunicator/remote -m ".$msg." 2>&1");
	echo "<script type='text/javascript'>document.getElementById('msgbar').innerHTML='DONE';</script>";
}
?>
