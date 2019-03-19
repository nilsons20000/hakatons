<?php
    require "functions/Database.php";
    //require_once"functions/functions.php";
    $database = new Database();
    $schools = $database->getSchools();

	include "functions/locations_model.php";
	include "functions/functions.php";
	include "functions/filter.php";
 ?>
<!DOCTYPE html>
<html lang="lv" xmlns="http://www.w3.org/1999/html">
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/main.css"><link rel="stylesheet" type="text/css" href="css/tabula.css">
	<link rel="stylesheet" type="text/css" href="css/filter.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript" src="./js/menu.js"></script>
	<script src="https://use.fontawesome.com/320ac68418.js"></script>
	<link rel="stylesheet" type="text/css" href="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.css" />

<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js'></script>
<script type='text/javascript' src='http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.js'></script>
</head>
<body>
<div id="page-wrap">
<header>
	<div class="name">
	<a href="index.php" title="На главную" id="title">Test-Site</a>
	</div>
	<div id="myNav" class="overlay"> 
				<a href="javascript:void(0)" 
				class="closebtn" 
				onclick="closeNav()">×</a> 
				<div class="overlay-content">
<!--					<div id="mape_search">-->
<!--						<input type="" name="" placeholder="Adrese" id="adrese">-->
<!--						<input type="" name="" placeholder="Attalums" id="attalums">-->
<!--					</div>-->
					<form  enctype='multipart/form-data' action="" method="POST" multiple name="filter[]">
					<div class="overlay-content_under">
						
							<div id="filter_block" id="select">
							<p>Izglītība iestādes</p>
							<select name="filter[]" size="3">
							  <option name="filter[]" value="bernudarzi">Bērnudarzi</option>
							  <option name="filter[]" value="pec_bernudarza">Pēc bērnudarza</option>
							  <option name="filter[]" value="pec_9kl">Pēc 9.klases</option>
							  <option name="filter[]" value="pec_12kl">Pēc 12.klases</option>
							  <option name="filter[]" value="koledzi"> Koledži</option>
							  <option name="filter[]" value="tehnikumi">Tehnikumi</option>
							  <option name="filter[]" value="tehnikumi">Universitātes</option>
							</select>
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
							<p>Reitings pēc eksamēniem</p>
							<select name="filter[]" size="3">
							  <option name="filter[]" value="matematika">Matemātika</option>
							  <option name="filter[]" value="latv_val">Latviešu valoda</option>
							  <option name="filter[]" value="angl_val">Angļu valoda</option>
							</select>
							</div>

							<div id="filter_block">
							<p>Profesijas</p>
							<select name="filter[]" size="3">
							  <option>Seit bus  </option>
							  <option>Profesijas no DB</option>
							</select>
							</div>

							<div id="filter_block">
								<div id="stipendija">
									Stipendija
									<p class="onoff"><input type="checkbox" name="filter[]" value="stipendijaA" id="checkboxID"><label for="checkboxID"></label></p>
								</div>
								<div id="kopmitne">
									Kopmitne
									<p class="onoff"><input type="checkbox" name="filter[]" value="kopmitneE" id="checkboxIDI"><label for="checkboxIDI"></label></p>
								</div>
							</div>
							<div id="search">
							<input class="icon" value="Submit" type="Submit"><i class="fa fa-search fa-5x"></i></button>
						
							</div>
					</div>
					</form>
				</div> 
	</div> 	<? 
	
							
	
	?>

	<span id="open" onclick="openNav()">☰ open</span>
</header>
<div id="map" style="width: 100%; height: 440px; border: 1px solid #AAA;"></div> 
<script>
  var tempArray = JSON.parse('<?php get_saved_locations(); ?>');
  var map = L.map( 'map', {
    center: [57.08233,25.24116],
    minZoom: 0.5,
    zoom: 7
  });

  L.tileLayer( 'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
  attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>',
  subdomains: ['a', 'b', 'c']
  }).addTo( map );

  for ( var i=0; i < tempArray.length; ++i ){
    L.marker(tempArray[i]).bindPopup( '<a href="' + tempArray[i] + '" target="_blank">' + tempArray[i][2] + '</a>' ) .addTo( map );
}
</script>
<?php
filter($_POST);
?>
<nav class="dws-menu">  
	<table width="100%" id="table">
	<thead>
	   <tr>
	    	<th class="th_width">Nosaukums</th>
	    	<th class="th_width">Reitings</th>
	   		<th class="th_width">Izglītība</th>
	   </tr>
	</thead>
	<tbody> 
	<?php
//	$page = $_GET["page"];
//    if ($page < 1 or $page == "") $page = 1;
//    // количество строк-статей на стр.
//    $limit = 20;
//	$start = getStart($page, $limit);
//	$skolas= getAllArticles($start, $limit);
    require "views/table.view.php";
	?>
	</tbody> 
 	</table>
</nav>
<?php
//    echo "<center>";
//          echo pagination($page, $limit);
//    echo "</center>";
//?>
</div>
</body>
</html>