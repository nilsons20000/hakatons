<?php
	//Koordinātes priekš kartes
	function getSavedLocations($schools) {
		$coordinates = '[';

		foreach ($schools as $school) {
			$long = $school->getLongtitude();
			$lat = $school->getLatitude();
			$name = replaceQuotes($school->getName());
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
	function replaceQuotes($name) {

	    return str_replace('"','\\\"',$name);
}

