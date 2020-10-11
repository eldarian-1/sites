<?

include("database.php");
include("layout.php");
include("output.php");

$initAction = function(){
	if(!isset($_GET["action"]))
		$_GET["action"] = "view";
};

$updateTable = function(){
	global $insertQuery, $updateQuery, $deleteQuery;
	if($_GET["action"] == "new")
		$insertQuery(
			$_POST["firstName"],
			$_POST["lastName"],
			$_POST["phoneNumber"],
			$_POST["salary"],
			$_POST["address"],
			$_POST["expirience"]);
	elseif($_GET["action"] == "update")
		$updateQuery(
			$_GET["id"],
			$_POST["firstName"],
			$_POST["lastName"],
			$_POST["phoneNumber"],
			$_POST["salary"],
			$_POST["address"],
			$_POST["expirience"]);
	elseif($_GET["action"] == "delete")
		$deleteQuery($_GET["id"]);
};

$getAction = function(){
	if($_GET["action"] == "view")
		return "new";
	elseif($_GET["action"] == "edit")
		return "update&id={$_GET["id"]}";
	else
		header("Location: http://lab4.edu/");
};

$initAction();
$updateTable();
$layout($getAction());

?>