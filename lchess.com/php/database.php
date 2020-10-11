<?php

$host = "localhost";
$user = "mysql";
$pass = "mysql";
$db = "lchess";

$link = mysqli_connect($host, $user, $pass) or die("Could not connect: ".mysqli_error($link));

function db_create($link, $db){
	
	mysqli_query($link, "CREATE DATABASE $db");
	
	mysqli_query($link, "USE $db");

	mysqli_query($link,
		"CREATE TABLE games (
		gameId INT (10) AUTO_INCREMENT,
		nameWhite VARCHAR (30),
		nameBlack VARCHAR (30),
		idWhite INT (10),
		idBlack INT (10),
		lastPath VARCHAR (5),
		areActive INT(5) DEFAULT 0,
		PRIMARY KEY (gameId))"
	);
}

db_create($link, $db);

mysqli_select_db($link, $db) or die("Could not select database: ".mysqli_error($link));

?>