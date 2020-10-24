<?

include("database.php");
include("layout.php");
include("output.php");

$initAction = function(){
	if(!isset($_GET["action"]))
		$_GET["action"] = "view";
};

$initView = function(){
	if(!isset($_GET["view"]))
		$_GET["view"] = "main";
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

$getPage = function(){
	global $mainPage, $logPage;
	switch($_GET['view']){
		case 'main': return $mainPage;
		case 'log': return $logPage;
	}
};

$initAction();
$initView();
$updateTable();
$layout($getPage());

?>