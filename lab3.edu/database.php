<?

$host = "localhost";
$user = "mysql";
$pass = "mysql";
$db = "labs";
$table = "lab2";
$link;

$createBase = function(){
	global $host, $user, $pass, $db, $link;
	$link = mysqli_connect($host, $user, $pass)
		or die("Could not connect: ".mysqli_error($link));
	mysqli_query($link, "CREATE DATABASE $db");
	mysqli_query($link, "USE $db");
	mysqli_select_db($link, $db)
		or die("Could not select database: ".mysqli_error($link));
};

$createTable = function(){
	global $table, $link;
	mysqli_query($link,
		"CREATE TABLE $table (
		EmployeeId INT (10) AUTO_INCREMENT,
		FirstName VARCHAR (30)DEFAULT \"\",
		LastName VARCHAR (30)DEFAULT \"\",
		PhoneNumber VARCHAR (20)DEFAULT \"\",
		Salary INT (10) DEFAULT 0,
		Address VARCHAR (255) DEFAULT \"\",
		Expirience INT(2) DEFAULT 0,
		PRIMARY KEY (EmployeeId))"
	);
};

$createBase();
$createTable();

?>