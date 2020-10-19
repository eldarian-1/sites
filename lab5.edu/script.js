var countLine = 1;

var addLine = function(){
	var table = document.getElementById("createTable");
	table.innerHTML = table.innerHTML + "<tr>" +
		"<td><input class=\"inputTable\" type=\"text\" name=\"name" + countLine + "\"></td>" +
		"<td><input class=\"inputTable\" type=\"text\" name=\"type" + countLine + "\"></td>" +
		"<td><input class=\"inputTable\" type=\"text\" name=\"null" + countLine + "\"></td>" +
		"<td><input class=\"inputTable\" type=\"text\" name=\"default" + countLine + "\"></td>" +
		"<td><input class=\"inputTable\" type=\"text\" name=\"other" + countLine + "\"></td></tr>";
	++countLine;
	var forma = document.getElementById("formCreateTable");
	forma.action = "?action=createTable&count=" + countLine;
}

window.onload = function(){
	document.getElementById("addLine").onclick = addLine;
}