<?

$printId = function($id){
	if($id == "EmployeeId"){
		?><td><?=$id?></td><?
	} else{
		?><td><a href="?action=edit&id=<?=$id?>"><?=$id?></a></td><?
	}
};

$itemTable = function(
	$employeeId,
	$firstName,
	$lastName,
	$phoneNumber,
	$salary,
	$address,
	$expirience
){
	global $printId;
?><tr>
	<? $printId($employeeId); ?>
	<td><?=$firstName?></td>
	<td><?=$lastName?></td>
	<td><?=$phoneNumber?></td>
	<td><?=$salary?></td>
	<td><?=$address?></td>
	<td><?=$expirience?></td>
</tr><?
};

$selectAll = function(){
	global $table, $link, $itemTable;
	$result = mysqli_query($link,
		"SELECT *
		FROM $table");
	if($result){
		$n = mysqli_num_rows($result);
		$itemTable(
			"EmployeeId",
			"FirstName",
			"LastName",
			"PhoneNumber",
			"Salary",
			"Address",
			"Expirience");
		for($i = 0; $i < $n; ++$i){
			$row = mysqli_fetch_assoc($result);
			$itemTable(
				$row["EmployeeId"],
				$row["FirstName"],
				$row["LastName"],
				$row["PhoneNumber"],
				$row["Salary"],
				$row["Address"],
				$row["Expirience"]);
		}
	}
    mysqli_free_result($result);
};

?>