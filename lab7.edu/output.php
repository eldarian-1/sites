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
	global $link, $itemTable;
	$result = mysqli_query($link,
		"SELECT * FROM lab2");
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

$itemPhone = function(
	$firstName,
	$lastName,
	$phoneNumber
){
?><tr>
	<td><?=$firstName?></td>
	<td><?=$lastName?></td>
	<td><?=$phoneNumber?></td>
</tr><?
};

$allPhones = function(){
	global $link, $itemPhone;
	$result = mysqli_query($link,
		"SELECT * FROM phones");
	if($result){
		$n = mysqli_num_rows($result);
		$itemPhone(
			"FirstName",
			"LastName",
			"PhoneNumber");
		for($i = 0; $i < $n; ++$i){
			$row = mysqli_fetch_assoc($result);
			$itemPhone(
				$row["FirstName"],
				$row["LastName"],
				$row["PhoneNumber"]);
		}
	}
    mysqli_free_result($result);
};

$itemLog = function(
	$IdLog,
	$EmployeeId,
	$TypeOperation,
	$OperationDate,
	$Description
){
?><div class="log">
	<p>IdLog: <?=$IdLog?> | Type: <?=$TypeOperation?> | IdEmployee: <?=$EmployeeId?> | DateTime: <?=$OperationDate?></p>
	<p>Description: <?=$Description?></p>
</div><?
};

$allLogs = function(){
	global $link, $itemLog;
	$result = mysqli_query($link, "SELECT * FROM Log");
	if($result){
		$n = mysqli_num_rows($result);
		for($i = 0; $i < $n; ++$i){
			$row = mysqli_fetch_assoc($result);
			$itemLog(
				$row["IdLog"],
				$row["IdEmployee"],
				$row["TypeOperation"],
				$row["OperationDate"],
				$row["Description"]);
		}
	}
    mysqli_free_result($result);
};

$itemUpdate = function(
	$TypeOperation,
	$OperationDate,
	$Description
){
?><div class="log">
	<?=$TypeOperation?> | <?=$OperationDate?><br>
	<?=$Description?>
</div><?
};

$itemUpdates = function($EmployeeId){
	global $link, $itemUpdate;
?><div class="update">
	<div class="log"><?=$EmployeeId?></div><?
		$result = mysqli_query($link, "SELECT * FROM Changes WHERE IdEmployee = $EmployeeId");
		if($result){
			$n = mysqli_num_rows($result);
			for($i = 0; $i < $n; ++$i){
				$row = mysqli_fetch_assoc($result);
				$itemUpdate(
					$row["OperationType"],
					$row["OperationDate"],
					$row["Description"]);
				//print_r($row);
			}
		}
		mysqli_free_result($result);
?></div><?
};

$allUpdates = function(){
	global $link, $itemUpdates;
	$result = mysqli_query($link, "SELECT IdEmployee FROM Updates");
	if($result){
		$n = mysqli_num_rows($result);
		for($i = 0; $i < $n; ++$i){
			$row = mysqli_fetch_assoc($result);
			$itemUpdates($row["IdEmployee"]);
		}
	}
    mysqli_free_result($result);
};

?>