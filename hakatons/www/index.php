<?
    require_once"functions/functions.php";
	include "functions/locations_model.php";

 ?>
<!DOCTYPE html>
<html>
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
	<a href="index.html" title="На главную" id="title">Test-Site</a>
	</div>
	<div id="myNav" class="overlay"> 
				<a href="javascript:void(0)" 
				class="closebtn" 
				onclick="closeNav()">×</a> 
				<div class="overlay-content"> 
					<div id="mape_search">
						<input type="" name="" placeholder="Adrese" id="adrese">
						<input type="" name="" placeholder="Attalums" id="attalums">
					</div>
					<div class="overlay-content_under">
						<>
						<div id="filter_block" id="select">
						<p>Izglītība iestādes</p>
						<select size="3">
						  <option>Bērnudarzi</option>
						  <option>Pēc bērnudarza</option>
						  <option>Pēc 9.klases</option>
						  <option>Pēc 12.klases</option>
						  <option>Koledži</option>
						  <option>Tehnikumi</option>
						  <option>Universitātes</option>
						</select>
						</div>
						<div id="filter_block">						
						<p>Izglītība</p>

						<select size="3">
						  <option>Pirmskolas izglītība</option>
						  <option>Pamatizglītība</option>
						  <option>Vidējā izglītība</option>
						  <option>Prof. vidējā izglītība</option>
						  <option>Pēcvidējā izglītība</option>
						  <option>Augstākā izglītība</option>
						  <option>Pēcdiploma studijas</option>
						</select>
						</div>

						<div id="filter_block">
						<p>Reitings pēc eksamēniem</p>
						<select size="3">
						  <option>Matemātika</option>
						  <option>Latviešu valoda</option>
						  <option>Angļu valoda</option>
						</select>
						</div>

						<div id="filter_block">
						<p>Profesijas</p>
						<select size="3">
						  <option>Seit bus  </option>
						  <option>Profesijas no DB</option>				
						</select>
						</div>

						<div id="filter_block">
							<div id="stipendija">
								Stipendija
								<p class="onoff"><input type="checkbox" value="1" id="checkboxID"><label for="checkboxID"></label></p>
							</div>
							<div id="kopmitne">
								Kopmitne
								<p class="onoff"><input type="checkbox" value="2" id="checkboxIDI"><label for="checkboxIDI"></label></p>
							</div>
						</div>
						<div id="search">
	    				<button class="icon"><i class="fa fa-search fa-5x"></i></button>
						</div>
					</div>
				</div> 
	</div> 
	<span id="open"onclick="openNav()">☰ open</span>
</header>
<div id="map" style="width: 100%; height: 440px; border: 1px solid #AAA;"></div> 
<script>
  var tempArray = JSON.parse('<?php get_saved_locations(); ?>');
  var map = L.map( 'map', {
    center: [57.08233,25.24116],
    minZoom: 0.5,
    zoom: 7
  })

  L.tileLayer( 'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
  attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>',
  subdomains: ['a', 'b', 'c']
  }).addTo( map )

  for ( var i=0; i < tempArray.length; ++i ){
    L.marker(tempArray[i]).bindPopup( '<a href="' + tempArray[i] + '" target="_blank">' + tempArray[i][2] + '</a>' ) .addTo( map );
}
</script>
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
	<?
	$news = getAllArticles();
    for ($i = 0; $i < count($news); $i++){
            $id="sub_m$i";
            $id_subT="Subtable$i";
            $td_id="tdd$i";
    echo' '.$id.'
    		'.$id_subT.'

		<tr>
		   	<td>'.$news[$i]['Iestades_nosaukums'].'</td>
		   	<td>5</td></td>
		   	<td>Videja </td>

		   	<td id="check">
			   	<input type="checkbox" name="toogle"  class="toogleSubmenu" id='.$id.'>

			   	<label for='.$id.' class="toogleSubmenu"><i class="fa"></i></label>
			</td>
		</tr>
			<tr class="table_row">
				<td id="tdd">
				   	<div  id='.$id_subT.'>
				   		<div class="stipendijaa"id="Stipendija">
					   		<p>Stipendija
					    	<span class="text">JA</span></p>
						</div>
						<div id="Kopmitne">
					    	<p >Kopmitne
					    	<span class="text">JA</span></p>
				    	</div>
				    </div>
				</td>
			</tr>
	';
	};
	?>
	</tbody> 
 	</table>
</nav>
</div>
</body>
</html>