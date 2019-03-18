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
	
	function getAllArticles($start, $limit) {
		$connect = connectDB();
		$result = mysql_query("SELECT * FROM `macibu_iestades_infa` LIMIT ".$start.", ".$limit,$connect);
		closeDB($connect);
		return setResultToArray($result);
	}
	function getStart($page, $limit) {
		return $limit * ($page - 1);
	}
	function setResultToArray($result) {
		$array = array();
		while ($row = mysql_fetch_assoc($result)) $array[] = $row;
		return $array;
	}
	
	function countArticles() {
		$connect = connectDB();
		$result = mysql_query("SELECT COUNT(`Reģistrācijas_numurs`) FROM `macibu_iestades_infa`", $connect) or die(mysql_error());
		closeDB($connect);
		$result = mysql_fetch_row($result);
		return $result[0];
	}

	
function pagination($page, $limit) {
		// общее кол-во строк в БД
		$count_articles = countArticles();
		// общее количество стр.
		$count_pages = ceil($count_articles / $limit);
		if ($page > $count_pages) $page = $count_pages;
		$prev = $page - 1;
		$next = $page + 1;
		if ($prev < 1) $prev = 1;
		if ($next > $count_pages) $next = $count_pages;
		$pagination = "";
		if ($count_pages > 1) {
			// pagination
			if ($page == 1) {
				$pagination .= "<span>Прервая </span>";
				$pagination .= "<span>Предыдущая </span>";
			}
			else {
				$pagination .= "<a href='index.php'>Прервая </a>";
				if ($prev == 1) $pagination .= "<a href='index.php'>Прервая </a>";
				else $pagination .= "<a href='index.php?page=".$prev."'>Предыдущая </a>";
			}
			for ($i = 1; $i <= $count_pages; $i++) {
				if ($i == $page) $pagination .= "<span> ".$i." </span>";
				elseif ($i == 1) $pagination .= "<a href='index.php'> ".$i." </a>";
				else $pagination .= "<a href='index.php?page=".$i."'> ".$i." </a>";
			}
			if ($page == $count_pages) {
				$pagination .= "<span> Следующая</span>";
				$pagination .= "<span> Последняя</span>";
			}
			else {
				$pagination .= "<a href='index.php?page=".$next."'> Следующая</a>";
				$pagination .= "<a href='index.php?page=".$count_pages."'> Последняя</a>";
			}
		}
		return $pagination;
	}
	
?>

