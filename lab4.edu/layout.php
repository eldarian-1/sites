<?

$getButtons = function(){
	if($_GET["action"] == "edit") {
		?><a href="?action=delete&id=<?=$_GET["id"]?>">Удалить</a> <?
		?><input type="submit" value="Обновить"><?
	} elseif($_GET["action"] == "view") {
		?><input type="submit" value="Добавить"><?
	}
};

$layout = function($action){
	global $selectAll, $getButtons, $getById;
	$data = $getById();
?><!doctype html>
<html>
	<head>
		<title>Лабораторная работа №4</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<div class="box">
			<div class="table"><table class="query">
				<? $selectAll(); ?>
			</table></div>
			<div class="form"><form method="post" autocomplete="off" action="?action=<?=$action?>">
				<table>
					<tr><td>Имя</td><td><input type="text" name="firstName" value="<?=$data["FirstName"]?>"></td></tr>
					<tr><td>Фамилия</td><td><input type="text" name="lastName" value="<?=$data["LastName"]?>"></td></tr>
					<tr><td>Телефон</td><td><input type="text" name="phoneNumber" value="<?=$data["PhoneNumber"]?>"></td></tr>
					<tr><td>Зарплата</td><td><input type="text" name="salary" value="<?=$data["Salary"]?>"></td></tr>
					<tr><td>Адрес</td><td><input type="text" name="address" value="<?=$data["Address"]?>"></td></tr>
					<tr><td>Стаж</td><td><input type="text" name="expirience" value="<?=$data["Expirience"]?>"></td></tr>
				</table>
				<div class="buttons"><? $getButtons(); ?></div>
			</form></div>
		</div>
	</body>
</html><?
};
?>