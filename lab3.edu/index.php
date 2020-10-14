<?

include("database.php");
include("layout.php");
include("query.php");

$getTable = function(){
	global $selectAll, $query1, $query2, $query3;
	if(!isset($_GET["view"]))
		$_GET["view"] = "table";
	switch($_GET["view"]){
		case "table":
			return $selectAll;
		case "query1":
			return $query1;
		case "query2":
			return $query2;
		case "query3":
			return $query3;
	}
};

$layout($getTable());

?>