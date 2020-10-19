<?

$host = "localhost";
$user = "mysql";
$pass = "mysql";
$db = "labs";
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

$formCreateTable = function(){
	global $link;
	$query = "CREATE TABLE " . $_POST['name'] . " (";
	for($i = 0, $n = 1*$_GET['count']; $i < $n; ++$i)
		$query = $query . $_POST['name' . $i] . " " . $_POST['type' . $i]
		. " " . $_POST['null' . $i] . " " . $_POST['default' . $i] . " "
		. $_POST['other' . $i] . ($i == $n - 1 ? "" : ",");
	$query = $query . ")";
	mysqli_query($link, $query);
};

$dropTable = function(){
	global $link;
	$query = mysqli_query($link, "DROP TABLE " . $_GET["table"]);
};

$addToTable = function(){
	global $link;
	$query = "INSERT INTO " . $_GET['table'] . " SET ";
	foreach ($_POST as $key => $value)
		if($key != 'table')
			$query = $query . $key . "=\"" . $value . "\",";
	$query = mb_substr($query, 0, strlen($query) - 1);
	mysqli_query($link, $query);
};

$createBase();

?>