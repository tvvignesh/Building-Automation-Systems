<?php
$db=new mysqli("localhost","root","chiggyviggy","bas");
	if ($db->connect_errno)
	{
		die("OOPS! Could not connect to the database!".$db->connect_errno().$db->connect_error);
	}
	$db->select_db("bas");
	$GLOBALS["dbobj"]=$db;
?>