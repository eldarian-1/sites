<?

$rowTable = function($array){
	echo "<tr>";
	for($i = 0, $n = count($array); $i < $n; ++$i)
		echo "<td>" . $array[$i] . "</td>";
	echo "</tr>";
};

$fieldsTable = function($array){
	$result = "";
	for($i = 0, $n = count($array); $i < $n; ++$i)
		$result = $result . ($i == 0 ? "" : ",") . $array[$i];
	return $result;
};

$formAdd = function($array){
	echo "<form method='post' action='?action=addtotable&table=" . $_GET['table'] . "'><table>";
	for($i = 0, $n = count($array); $i < $n; ++$i)
		echo "<tr><td>" . $array[$i] . "</td><td><input type='text' name='" . $array[$i] . "'></td></tr>";
	echo "</table><a href='?action=droptable&table=" . $_GET['table'] . "'>Удалить таблицу</a><input type='submit' value='Добавить'>";
};

$tableView = function(){
	global $link, $rowTable, $fieldsTable, $formAdd;
	$query = mysqli_query($link, "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME='" . $_GET['table'] . "'");
	$result0 = array(); $i = 0;
	while ($table = mysqli_fetch_row($query))
		$result0[$i++] = $table[0];
	$query = mysqli_query($link, "SELECT ".$fieldsTable($result0)." FROM " . $_GET['table']);
	$result1 = array(); $i = 0;
	while ($table = mysqli_fetch_row($query))
		$result1[$i++] = $table;
	?><table class="query"><?
	$rowTable($result0);
	for($i = 0, $n = count($result1); $i < $n; ++$i)
		$rowTable($result1[$i]);
	?></table><?
	$formAdd($result0);
};

?>