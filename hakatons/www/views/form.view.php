<?php
/**
 * Created by PhpStorm.
 * User: sloppynick3
 * Date: 3/21/2019
 * Time: 6:55 PM
 */

echo '					<form class="mx-auto" enctype=\'multipart/form-data\' action=""  method="POST" multiple name="filter[]">
					        <ul class="navbar-nav">
							<select class="custom-select " name="filter[]">
							<option selected disabled>Izvēlaties iestade</option>';
$database->printIestades();
echo '							</select>
						                 
                                <select class="custom-select" name="filter[]" >
                                <option selected disabled>Izvēlaties Izglitibas veidu</option>
                                  <option name="filter[]" value="izglitiba1">Pirmskolas izglītība</option>
                                  <option name="filter[]" value="izglitiba2">Pamatizglītība</option>
                                  <option name="filter[]" value="izglitiba3">Vidējā izglītība</option>
                                  <option name="filter[]" value="izglitiba4">Prof. vidējā izglītība</option>
                                  <option name="filter[]" value="izglitiba5">Pēcvidējā izglītība</option>
                                  <option name="filter[]" value="izglitiba6">Augstākā izglītība</option>
                                </select>
														
					        
							<select class="custom-select" name="filter[]" >
							  <option selected disabled>Izvēlaties profesiju</option>';
$database->printProfesijas();
echo'					    </select>
							
							
					';