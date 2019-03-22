
<?php
for ($i = 0; $i < count($schools); $i++)  {
    //TODO:Uzlabot koda lasamibu
    $id="sub_m$i";
    $id_subT="Subtable$i";
    $td_id="tdd$i";
    echo'
		<tr>
		   	<td>'.$schools[$i]->getName().'</td>
		   	<td>'. $schools[$i]->getIzglitiba().' </td>
		   	<td id="check">
			   	<input type="checkbox" name="toogle"  class="toogleSubmenu" id='.$id.'>
			   	<label for='.$id.' class="toogleSubmenu"><i class="fa"></i></label>
			</td>
		</tr>
			<tr class="table_row">
				<td id="tdd">
				   	<div class="card cardbody" id='.$id_subT.'>
					   		<p>Telefona numurs: <span class="text">'.$schools[$i]->getPhoneNr().'</span></p>
					    	<p >Adrese: <span class="text">'.$schools[$i]->getAddress().'</span></p>
					    	<p>Direktors: <span class="text">'.$schools[$i]->getDirector().'</span></p>
					    	<p>E-pasts: <span class="text">'.$schools[$i]->getEmail().'</span></p>
					    	
				    </div>
				</td>
			</tr>
	';
};