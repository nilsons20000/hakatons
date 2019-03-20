<?php
    require "functions/Database.php";
include "functions/filter.php";
    //require_once"functions/functions.php";
    $database = new Database();
    $schools = null;

    if ($_SERVER['REQUEST_METHOD'] === "GET") {
        $schools = $database->getSchools();
    } else {
        $schools = filter($_POST, $database);
    }

	include "functions/functions.php";

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
                                <?php
                                    printForm($database);
                                ?>
				</div> 
	</div>

	<span id="open" onclick="openNav()">☰ open</span>
</header>
<div id="map" style="width: 100%; height: 440px; border: 1px solid #AAA;"></div> 
<script>
  var map = L.map( 'map', {
    center: [57.08233,25.24116],
    minZoom: 0.5,
    zoom: 7
  });

  L.tileLayer( 'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
  attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>',
  subdomains: ['a', 'b', 'c']
  }).addTo( map );
  var tempArray = JSON.parse('<?php getSavedLocations($schools); ?>');
  for ( var i=0; i < tempArray.length; ++i ){
    L.marker(tempArray[i]).addTo(map).bindPopup(tempArray[i][2]);
}
</script>
<nav class="dws-menu">  
	<table width="100%" id="table">
	<thead>
	   <tr>
	    	<th class="th_width">Nosaukums</th>
	   		<th class="th_width">Izglītība</th>
	   </tr>
	</thead>
	<tbody> 
	<?php
    if ($schools != null) {
        var_dump($schools);
        require "views/table.view.php";
    };

	?>
	</tbody> 
 	</table>
</nav>
</div>
</body>
</html>