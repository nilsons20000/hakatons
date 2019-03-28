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
							<option selected value="null">Izvēlaties iestadi</option>';
$database->printIestades();
echo '							</select>
						                 
                                <select class="custom-select" name="filter[]" >
                                <option selected>Izvēlēties izglītības līmeni</option>
                                  <option name="filter[]" value="izglitiba1">Pirmskolas izglītība</option>
                                  <option name="filter[]" value="izglitiba2">Pamatizglītība</option>
                                  <option name="filter[]" value="izglitiba3">Vidējā izglītība</option>
                                  <option name="filter[]" value="izglitiba4">Prof. vidējā izglītība</option>
                                  <option name="filter[]" value="izglitiba5">Pēcvidējā izglītība</option>
                                  <option name="filter[]" value="izglitiba6">Augstākā izglītība</option>
                                </select>
														
					        <input class="custom-select" placeholder="Izvēlēties profesiju" list="profesijas" name="filter[]" autocomplete="off">
							<datalist id="profesijas" >
							  ';
$database->printProfesijas();
echo '					    </datalist>
                    				
                            <input class="form-control mr-sm-2" type="search" name="filter[]" placeholder="Meklēt" aria-label="Adrese">
                            
                            <button class="btn btn-outline-danger my-2 my-sm-0" value="Submit" type="submit">Mēklēt</button>
                        </ul>
                    </form>		
					';