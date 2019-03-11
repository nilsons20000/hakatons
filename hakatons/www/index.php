<?
       require_once"functions/functions.php";
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
<div class="mape">
	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2233344.5327052334!2d22.301421022006625!3d56.86308620563183!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46e930677b8a9afd%3A0xcfcd68f2fc10!2z0JvQsNGC0LLQuNGP!5e0!3m2!1sru!2slv!4v1551807148225" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>

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