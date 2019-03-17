<?php
	function connectDB() {
		$connect = mysql_connect("localhost", "root", "");
		mysql_select_db("ucebnie_zavedenija_latvii", $connect);
		mysql_set_charset("cp1257_general_ci", $connect);
		mysql_query("SET NAMES UTF8");
		return $connect;
	}
	function closeDB($connect) {
		mysql_close($connect);
	}
	
	function getAllArticles() {
		$connect = connectDB();
		$result = mysql_query("SELECT * FROM `macibu_iestades_infa`");
		closeDB($connect);
		return setResultToArray($result);
	}
	
	function setResultToArray($result) {
		$array = array();
		while ($row = mysql_fetch_assoc($result)) $array[] = $row;
		return $array;
	}
	
	function countArticles() {
		$connect = connectDB();
		$result = mysql_query("SELECT COUNT(`id`) FROM `ucebnie_zavedenija_latvii`");
		closeDB($connect);
		$result = mysql_fetch_row($result);
		return $result[0];
	}
		


	
?>
