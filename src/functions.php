<?php
	function randomstring($length=15,$db="",$table="",$col="")
	{
		$randval=substr(md5(microtime()),rand(0,26),$length);
		if($db==""&&$table==""&&$col=="")
		{
			return $randval;
		}
	}
	
	function dbquery($query,$dbname="bas")
	{
		$db=$GLOBALS["dbobj"];
		$db->select_db($dbname);
		if ($result = $db->query($query))
		{
			$finfo = $result->fetch_fields();
			$c=0;
			foreach ($finfo as $val)
			{
				$colarr[$c]=$val->name;//get all colum names in this array
				$c++;
			}
			$co=0;
			while($obj = $result->fetch_object())
			{
				for($k=0;$k<count($colarr);$k++)
				{
				$tares[$co][$colarr[$k]]=$obj->$colarr[$k];
				}
				$co++;
			}
			if($co==0)
			{
				mysqli_kill($db,$db->thread_id);
				mysqli_close($db);
				return "";
			}
		}
		else
		{
				//dbquery($query,$dbname);
				echo "error";
		}
			//QUERY DONE
			unset($obj);unset($finfo);unset($query);unset($result);unset($colarr);unset($c);unset($co);
			mysqli_kill($db,$db->thread_id);mysqli_close($db);
			return $tares;
	}
	
	function dbupdate($query,$dbname="bas")
	{
		$db=$GLOBALS["dbobj"];
		$db->select_db($dbname);
	if (!$db->query($query))
		{
			dbupdate($query,$dbname);
		}
		else
		{
			mysqli_kill($db,$db->thread_id);mysqli_close($db);
			return TRUE;
		}
	}
?>