<?

$getTableList = function(){
	global $db, $link;
	$query = mysqli_query($link, "SELECT TABLE_NAME
		FROM INFORMATION_SCHEMA.TABLES
		WHERE TABLE_TYPE='BASE TABLE' AND TABLE_SCHEMA='$db'");
	return $query;
};

$layout = function($visual){
	global $getTableList;
?><!doctype html>
<html>
	<head>
		<title>Лабораторная работа №5</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<script type="text/javascript" src="script.js"></script>
	</head>
	<body>
		<div class="box">
			<div class="left">
				<p><a href="?">Создание таблицы</a></p>
				<? $tables = $getTableList(); while ($table = mysqli_fetch_row($tables)){ ?>
				<p><a href="?view=tableView&table=<?=$table[0]?>"><?=$table[0]?></a></p><?}?>
			</div>
			<div class="body">
				<? $visual(); ?>
			</div>
		</div>
	</body>
</html><?
};
?>