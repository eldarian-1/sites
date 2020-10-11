<?php

session_start();
include "../php/database.php";
header("Content-Type: application/json");

function sendPath($fromV, $fromH, $toV, $toH, $isPossible)
{
	echo "{\"path\":{";
	echo "\"v0\":$fromV,";
	echo "\"h0\":$fromH,";
	echo "\"v1\":$toV,";
	echo "\"h1\":$toH,";
	echo "\"isPossible\":$isPossible";
	echo "}}";
}

function sendWait()
{
	echo "{\"path\":{}}";
}

function mainFunction($link)
{
	$query = mysqli_query($link, "SELECT * FROM games WHERE gameId=".$_GET['gameId']." AND (idWhite=".$_GET['clientId']." OR idBlack=".$_GET['clientId'].")");
	
	$count = mysqli_num_rows($query);
	
	$a = mysqli_fetch_assoc($query);
	
	$path = $a['lastPath'];
	
	if(
		$count == 1 &&
		$path != null &&
		(
			(
				$a['idWhite'] == $_GET['clientId'] &&
				$a['areActive'] == 1
			) ||
			(
				$a['idBlack'] == $_GET['clientId'] &&
				$a['areActive'] == 2
			)
		)
	)
	{
		sendPath($path[0], $path[1], $path[2], $path[3], $path[4]);
	}
	else
	{
		sendWait();
	}
}

mainFunction($link);

?>