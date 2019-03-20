<?php
	function printForm($database){
		echo '					<form  enctype=\'multipart/form-data\' action="" method="POST" multiple name="filter[]">
					<div class="overlay-content_under">
						
							<div id="filter_block" id="select">
							<p>Izglītība iestādes</p>
							<select name="filter[]" size="3">';
		$database->printIestades();
		echo '							</select>
							</div>
							
							<div id="filter_block">
							<p>Izglītība</p>
							<select name="filter[]" size="3">
							  <option name="filter[]" value="pirms_izglitiba">Pirmskolas izglītība</option>
							  <option name="filter[]" value="pamat_izglitiba">Pamatizglītība</option>
							  <option name="filter[]" value="vid_izglitiba">Vidējā izglītība</option>
							  <option name="filter[]" value="prof_vid_izgl">Prof. vidējā izglītība</option>
							  <option name="filter[]" value="PecVid_izglitiba">Pēcvidējā izglītība</option>
							  <option name="filter[]" value="Augstaka_izglitiba">Augstākā izglītība</option>
							  <option name="filter[]" value="PecDiploma_studija">Pēcdiploma studijas</option>
							</select>
							</div>
														<div id="filter_block">
							<p>Profesijas</p>
							<select name="filter[]" size="auto">
							  ';
		$database->printProfesijas();
		echo'					</select>
							</div>
							<div id="filter_block">
								<div id="stipendija">
									Stipendija
									<p class="onoff"><input type="checkbox" name="filter[]" value="stipendijaA" id="checkboxID"><label for="checkboxID"></label></p>
								</div>
								<div id="kopmitne">
									Kopmitne
									<p class="onoff"><input type="checkbox" name="filter[]" value="kopmitneE" id="checkboxID1"><label for="checkboxID1"></label></p>
								</div>
							</div>
							<div id="search">
							<input class="icon" value="Submit" type="Submit"><i class="fa fa-search fa-5x"></i></button>

							</div>
					</div>
					</form>';
	}
	function getSavedLocations($schools) {
		$coordinates = '[';
		foreach ($schools as $school) {
			$long = $school->getLongtitude();
			$lat = $school->getLatitude();
			$name = $school->getName();
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
	
?>

