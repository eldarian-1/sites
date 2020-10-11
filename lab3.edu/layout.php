<?
$layout = function($callback)
{	
?><!doctype html>
<html>
	<head>
		<title>Лабораторная работа №3</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<div class="box">
			<table class="nav"><tr>
				<td><a href="?view=table">Таблица</a></td>
				<td><a href="?view=query1">Первый запрос</a></td>
				<td><a href="?view=query2">Второй запрос</a></td>
				<td><a href="?view=query3">Третий запрос</a></td>
			</tr></table>
			<table class="query">
				<? $callback(); ?>
			</table>
		</div>
	</body>
</html><?
};
?>