<?php

session_start();

include "../php/database.php";

function mainFunction($link)
{
	$lastPath = $_GET['v0'].$_GET['h0'].$_GET['v1'].$_GET['h1'].$_GET['isPossible'];
	
	$areActive;
	
	$query = "SELECT * FROM games WHERE gameId=".$_GET['gameId']." AND (idWhite=".$_GET['clientId']." OR idBlack=".$_GET['clientId'].")";
	
	$response = mysqli_query($link, $query);
	
	$array = mysqli_fetch_assoc($response);
	
	if($array['idWhite'] == $_GET['clientId'])
	{
		$areActive = 2;
	}
	else
	{
		$areActive = 1;
	}

	$query = "UPDATE games SET lastPath=\"".$lastPath."\",areActive=".$areActive." WHERE gameId=".$_GET['gameId'];
	
	mysqli_query($link, $query);
}

mainFunction($link);

?>