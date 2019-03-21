<?php
	function printForm($database){

	}
	function getSavedLocations($schools) {
		$coordinates = '[';

		foreach ($schools as $school) {
			$long = $school->getLongtitude();
			$lat = $school->getLatitude();
			$name = replaceQuotes($school->getName());
			if ($long == NULL or $lat == NULL) {
				continue;
			}
			if ($coordinates != '[') {
				$coordinates .= ',';
			}
			$coordinates .= '["'.$lat.'","'.$long.'","'.$name.'"]';
		}
		$coordinates .= ']';
		echo $coordinates;
	}
	function replaceQuotes($name) {

	    return str_replace('"','\\\"',$name);
}
/*function pagination($page, $limit) {
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
	
?>*/

