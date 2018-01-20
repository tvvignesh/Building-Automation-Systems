function loadrooms()
{
	var bid=$("#buildingid").val();
	$("#roomloader").load("loadroom.php?bid="+bid);
}

function loadrooms1()
{
	var bid=$("#buildingid").val();
	$("#roomloader").load("loadrooms1.php?bid="+bid);
}

function paramfactor()
{
	var ptype=$("#paramtype").val();
	if(ptype=="2")
	{
		$("#paramfactor").html('Parameter Factor: <input type="text" name="pfactor" placeholder="Factor of Conversion between this and standard parameter">');
	}
	else
	{
		$("#paramfactor").html('');
	}
}

function loaddevices()
{
	var bid=$("#buildingid").val();
	$("#deviceloader").load("loaddevices.php?bid="+bid);
}

function deviceloader()
{
	var bid=$("#buildingid").val();
	var rid=$("#rid").val();
	$("#deviceloader").load("loaddevices.php?bid="+bid+"&rid="+rid);
}

function switchload()
{
	var bid=$("#buildingid").val();
	var rid=$("#rid").val();
	var did=$("#did").val();
	$("#switchloader").load("switchloader.php?bid="+bid+"&rid="+rid+"&did="+did);
}

function loadtempcont()
{
	var bid=$("#buildingid").val();
	$("#temperaturecontainer").load("loadtemperature.php?bid="+bid);
}

function loadroomcont()
{
	var bid=$("#buildingid").val();
	$("#roomloader").load("loadrooms2.php?bid="+bid);
}

function lightingloader()
{
	var bid=$("#buildingid").val();
	var rid=$("#rid").val();
	$("#lightcontainer").load("loadlighting.php?bid="+bid+"&rid="+rid);
}