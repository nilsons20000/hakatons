<?php
/**
 * Created by PhpStorm.
 * User: sloppynick3
 * Date: 3/21/2019
 * Time: 6:55 PM
 */

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
							  <option name="filter[]" value="izglitiba1">Pirmskolas izglītība</option>
							  <option name="filter[]" value="izglitiba2">Pamatizglītība</option>
							  <option name="filter[]" value="izglitiba3">Vidējā izglītība</option>
							  <option name="filter[]" value="izglitiba4">Prof. vidējā izglītība</option>
							  <option name="filter[]" value="izglitiba5">Pēcvidējā izglītība</option>
							  <option name="filter[]" value="izglitiba6">Augstākā izglītība</option>
							</select>
							</div>
														<div id="filter_block">
							<p>Profesijas</p>
							<select name="filter[]" size="auto">
							  ';
$database->printProfesijas();
echo'					</select>
							</div>

							<div id="search">
							<input class="icon" value="Submit" type="Submit"><i class="fa fa-search fa-5x"></i></button>

							</div>
					</div>
					</form>';