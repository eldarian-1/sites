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
	global $mainPage, $phonePage, $logPage, $updatePage;
	if($_GET["action"] == "view" || $_GET["action"] == "edit"){
		switch($_GET['view']){
			case 'main':
				return $mainPage;
			case 'phone':
				return $phonePage;
			case 'log':
				return $logPage;
			case 'update':
				return $updatePage;
		}
	} else
		header("Location: http://lab7.edu/");
	
};

$initAction();
$initView();
$updateTable();
$layout($getPage());

?>