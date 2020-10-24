<?

$getButtons = function(){
	if($_GET["action"] == "edit") {
		?><a href="?action=delete&id=<?=$_GET["id"]?>">Удалить</a> <?
		?><input type="submit" value="Обновить"><?
	} elseif($_GET["action"] == "view") {
		?><input type="submit" value="Добавить"><?
	}
};

$getAction = function(){
	if($_GET["action"] == "view")
		return "new";
	elseif($_GET["action"] == "edit")
		return "update&id={$_GET["id"]}";
	else
		header("Location: http://lab6.edu/");
};

$mainPage = function(){
	global $selectAll, $getButtons, $getById, $getAction;
	$data = $getById();
	?><div class="table"><table class="query">
				<? $selectAll(); ?>
			</table></div>
			<div class="form"><form method="post" autocomplete="off" action="?action=<?=$getAction();?>">
				<table>
					<tr><td>Имя</td><td><input type="text" name="firstName" value="<?=$data["FirstName"]?>"></td></tr>
					<tr><td>Фамилия</td><td><input type="text" name="lastName" value="<?=$data["LastName"]?>"></td></tr>
					<tr><td>Телефон</td><td><input type="text" name="phoneNumber" value="<?=$data["PhoneNumber"]?>"></td></tr>
					<tr><td>Зарплата</td><td><input type="text" name="salary" value="<?=$data["Salary"]?>"></td></tr>
					<tr><td>Адрес</td><td><input type="text" name="address" value="<?=$data["Address"]?>"></td></tr>
					<tr><td>Стаж</td><td><input type="text" name="expirience" value="<?=$data["Expirience"]?>"></td></tr>
				</table>
				<div class="buttons"><? $getButtons(); ?></div>
			</form></div><?
};

$logPage = function(){
	global $allLogs;
	?><div class="table"><? $allLogs(); ?></div><?
};

$layout = function($page){
?><!doctype html>
<html>
	<head>
		<title>Лабораторная работа №6</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<div class="box">
			<table class="header">
				<tr>
					<td><a href="?view=main">Employee</a></td>
					<td><a href="?view=log">Log</a></td>
				</tr>
			</table>
			<? $page(); ?>
		</div>
	</body>
</html><?
};
?>