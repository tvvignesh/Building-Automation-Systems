<?php
error_reporting(E_ALL);
ini_set("display_errors",1);
if(isset($_POST["lighton"]))
{
	exec("sudo RF24RaspberryCommunicator/remote -m 3 2>&1");
}
if(isset($_POST["lightoff"]))
{
	exec("sudo RF24RaspberryCommunicator/remote -m 4 2>&1");
}
if(isset($_POST["brighten"]))
{
	exec("sudo RF24RaspberryCommunicator/remote -m 11 2>&1");
}
if(isset($_POST["dim"]))
{
	echo "2";
	exec("sudo ./sendcom -m 3");
}
if(isset($_POST["fan"]))
{
	echo "2";
	exec("sudo ./sendcom -m 4");
}
if(isset($_POST["temp"]))
{
	echo "2";
	exec("sudo ./sendcom -m 5");
}
if(isset($_POST["motion"]))
{
	echo "2";
	exec("sudo ./sendcom -m 6");
}
if(isset($_POST["doorsense"]))
{
	echo "2";
	exec("sudo ./sendcom -m 7");
}
if(isset($_POST["lightsense"]))
{
	echo "2";
	exec("sudo ./sendcom -m 8");
}
?>
<html>
<form action="exhibition.php" method="post">
<input type="hidden" value="1" name="lighton">
<input type="submit" value="Switch Light On">
</form>

<html>
<form action="exhibition.php" method="post">
<input type="hidden" value="2" name="lightoff">
<input type="submit" value="Switch Light Off">
</form>

<form action="exhibition.php" method="post">
<input type="hidden" value="3" name="brighten">
<input type="submit" value="Brighten Light">
</form>

<form action="exhibition.php" method="post">
<input type="hidden" value="4" name="dim">
<input type="submit" value="Dim Light">
</form>

<form action="exhibition.php" method="post">
<input type="hidden" value="5" name="fan">
<input type="submit" value="Switch Fan">
</form>

<form action="exhibition.php" method="post">
<input type="hidden" value="6" name="temp">
<input type="submit" value="Check Temperature & Humidity">
</form>

<form action="exhibition.php" method="post">
<input type="hidden" value="7" name="motion">
<input type="submit" value="Detect Motion">
</form>

<form action="exhibition.php" method="post">
<input type="hidden" value="8" name="doorsense">
<input type="button" value="Sense Door">
</form>

<form action="exhibition.php" method="post">
<input type="hidden" value="9" name="lightsense">
<input type="button" value="Sense Light">
</form>
</html>
