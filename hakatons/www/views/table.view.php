<?php


$i = 0;
foreach ($schools as $school) {
    $id="sub_m$i";
    $id_subT="Subtable$i";
    $td_id="tdd$i";
    echo' '.$id.'
    		'.$id_subT.'

		<tr>
		   	<td>'.$school->getName().'</td>
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
    $i++;
};