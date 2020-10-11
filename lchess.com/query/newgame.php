<?php

session_start();
include "../php/database.php";
header("Content-Type: application/json");

function sendAnswer($gameId, $name, $color)
{
	echo "{";
	echo "\"gameId\":$gameId,";
	echo "\"player\":{";
	echo "\"name\":\"$name\",";
	echo "\"color\":$color";
	echo "}}";
}

function sendWait($gameId)
{
	echo "{\"gameId\":$gameId,";
	echo "\"player\":{}}";
}

function findLastClean($link)
{
	$response = mysqli_query($link, "SELECT * FROM games WHERE areActive=0");
	$num = mysqli_num_rows($response);
	$array = mysqli_fetch_assoc($response);
	
	if($num != 0)
	{
		return $array;
	}
	else
	{
		return null;
	}
}

function isHaveServerClean($link, $array)
{
	$gameId = $array['gameId'];
	
	$myNameId;
	
	$rivalName;
	$rivalColor;
	
	if($array['nameWhite'] == null)
	{
		$rivalColor = 2;
		$myNameId = "nameWhite=\"".$_GET["name"]."\",idWhite=".$_GET['clientId'].",";
	}
	else
	{
		$rivalColor = 1;
		$myNameId = "nameBlack=\"".$_GET["name"]."\",idBlack=".$_GET['clientId'].",";
	}
	
	mysqli_query($link, "UPDATE games SET ".$myNameId."areActive=1 WHERE gameId=".$gameId);
	
	if($rivalColor == 1)
	{
		$rivalName = $array['nameWhite'];
	}
	else
	{
		$rivalName = $array['nameBlack'];
	}
	
	sendAnswer($gameId, $rivalName, $rivalColor);
}

function createClean($link)
{
	$myColor = rand(1,2);
	$myNameId;
	
	if($myColor == 1)
	{
		$myNameId = "nameWhite=\"".$_GET['name']."\",idWhite=".$_GET['clientId'];
	}
	else
	{
		$myNameId = "nameBlack=\"".$_GET['name']."\",idBlack=".$_GET['clientId'];
	}
	
	mysqli_query($link, "INSERT INTO games SET ".$myNameId);
	$gameId = mysqli_insert_id($link);
	
	sendWait($gameId);
}

function isSelectedClean($link, $gameId)
{
	$query = mysqli_query($link, "SELECT * FROM games WHERE gameId=".$gameId);
	$array = mysqli_fetch_assoc($query);
	
	if($array["areActive"] == 1)
	{
		$rivalName;
		$rivalColor;
		
		if($array['nameWhite'] == $_GET['name'])
		{
			$rivalName = $array['nameBlack'];
			$rivalColor = 2;
		}
		else
		{
			$rivalName = $array['nameWhite'];
			$rivalColor = 1;
		}
		
		sendAnswer($gameId, $rivalName, $rivalColor);
	}
	else
	{
		sendWait($gameId);
	}
}

function mainFunction($link)
{
	if(!isset($_GET['gameId']))
	{
		$array = findLastClean($link);
		
		if($array != null)
		{
			isHaveServerClean($link, $array);
		}
		else
		{
			createClean($link);
		}
	}
	else
	{
		isSelectedClean($link, $_GET['gameId']);
	}
}

mainFunction($link);

?>