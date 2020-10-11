<?

$itemTable = function(
	$employeeId,
	$firstName,
	$lastName,
	$phoneNumber,
	$salary,
	$address,
	$expirience
){
?><tr>
	<td><?=$employeeId?></td>
	<td><?=$firstName?></td>
	<td><?=$lastName?></td>
	<td><?=$phoneNumber?></td>
	<td><?=$salary?></td>
	<td><?=$address?></td>
	<td><?=$expirience?></td>
</tr><?
};

$item1 = function(
	$firstName,
	$lastName,
	$phoneNumber,
	$salary
){
?><tr>
	<td><?=$firstName?></td>
	<td><?=$lastName?></td>
	<td><?=$phoneNumber?></td>
	<td><?=$salary?></td>
</tr><?
};

$item2 = function(
	$firstName,
	$lastName,
	$address
){
?><tr>
	<td><?=$firstName?></td>
	<td><?=$lastName?></td>
	<td><?=$address?></td>
</tr><?
};

$item3 = function(
	$firstName,
	$lastName,
	$expirience
){
?><tr>
	<td><?=$firstName?></td>
	<td><?=$lastName?></td>
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

$query1 = function(){
	global $table, $link, $item1;
	$result = mysqli_query($link,
		"SELECT FirstName, LastName, PhoneNumber, Salary
		FROM $table");
	if($result){
		$n = mysqli_num_rows($result);
		$item1(
			"FirstName",
			"LastName",
			"PhoneNumber",
			"Salary");
		for($i = 0; $i < $n; ++$i){
			$row = mysqli_fetch_assoc($result);
			$item1(
				$row["FirstName"],
				$row["LastName"],
				$row["PhoneNumber"],
				$row["Salary"]);
		}
	}
    mysqli_free_result($result);
};

$query2 = function(){
	global $table, $link, $item2;
	$result = mysqli_query($link,
		"SELECT FirstName, LastName, Address
		FROM $table
		ORDER BY Address");
	if($result){
		$n = mysqli_num_rows($result);
		$item2(
			"FirstName",
			"LastName",
			"Address");
		for($i = 0; $i < $n; ++$i){
			$row = mysqli_fetch_assoc($result);
			$item2(
				$row["FirstName"],
				$row["LastName"],
				$row["Address"]);
		}
	}
    mysqli_free_result($result);
};

$query3 = function(){
	global $table, $link, $item3;
	$result = mysqli_query($link,
		"SELECT FirstName, LastName, Expirience
		FROM $table
		WHERE Expirience > 4");
	if($result){
		$n = mysqli_num_rows($result);
		$item3(
			"FirstName",
			"LastName",
			"Expirience");
		for($i = 0; $i < $n; ++$i){
			$row = mysqli_fetch_assoc($result);
			$item3(
				$row["FirstName"],
				$row["LastName"],
				$row["Expirience"]);
		}
	}
    mysqli_free_result($result);
};

?>