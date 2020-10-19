<?

include("database.php");
include("layout.php");
include("createTable.php");
include("tableView.php");

$initAction = function(){
	if(!isset($_GET["action"]))
		$_GET["action"] = "view";
};

$updateBase = function(){
	global $addToTable, $dropTable, $formCreateTable;
	if($_GET["action"] == "addtotable")
		$addToTable();
	elseif($_GET["action"] == "droptable")
		$dropTable();
	elseif($_GET["action"] == "createTable")
		$formCreateTable();
};

$getAction = function(){
	if($_GET["action"] == "view")
		return;
	else
		header("Location: http://lab5.edu/");
};

$getBody = function(){
	global $createTable, $tableView;
	if(!isset($_GET["view"]))
		$_GET["view"] = "createTable";
	if($_GET["view"] == "createTable")
		return $createTable;
	if($_GET["view"] == "tableView")
		return $tableView;
};

$initAction();
$updateBase();
$getAction();
$layout($getBody());

?>