<?
$addLine = function($index){
	?><tr>
		<td><input class="inputTable" type="text" name="name<?=$index?>"></td>
		<td><input class="inputTable" type="text" name="type<?=$index?>"></td>
		<td><input class="inputTable" type="text" name="null<?=$index?>"></td>
		<td><input class="inputTable" type="text" name="default<?=$index?>"></td>
		<td><input class="inputTable" type="text" name="other<?=$index?>"></td>
	</tr><?
};

$createTable = function(){
	global $addLine;
?><form id="formCreateTable" method="post" action="?action=createTable&count=1">
<p>Имя базы данных <input type="text" name="name"></p>
<table class="query" id="createTable">

	<tr>
		<td>Name</td>
		<td>Type</td>
		<td>Null</td>
		<td>Default</td>
		<td>Other</td>
	</tr>

	<? $addLine(0); ?>

</table>
<a id="addLine" href="#">Добавить строку</a>
<input type="submit" value="Создать">
</form><?
};

?>