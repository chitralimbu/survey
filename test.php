function countColour($beatpm){
		$eighty = $GLOBALS['eighty'];
		$hundred = $GLOBALS['hundred'];
		$huntwenty = $GLOBALS['huntwenty'];
		$colour = $GLOBALS['colour'];
		for ($k=0; $k < count($colour); $k++) { 
			$col[$k] = 0;
		}
		if ($beatpm == 80) {
			$bpm = $eighty;
		}
		if ($beatpm == 100) {
			$bpm = $hundred;
		}
		if ($beatpm == 120) {
			$bpm = $huntwenty;
		}
		//for eighty first
		
		for ($i=0; $i <count($colour); $i++) {
				$check = $colour[$i]; 
			for ($j= 0; $j <= count($bpm); $j++) { 
				if ($bpm[$j] == $check) {
					$col[$i] +=1;
				}
			}
		}
		return $col;
	}
	//show data as table just beat
	function showAsTable($bpm){
		$counted = countColour($bpm);
		$colour = $GLOBALS['colour'];
		echo '<div id ="tables1">';
		echo ''.$bpm.' bpm';
		echo '<table>';
		for ($i=0; $i < count($colour) - 1 ; $i++) { 
			echo '
					<tr>
						<td>'.$colour[$i].'</td>
						<td>'.$counted[$i].'</td>
					</tr>
			 ';	
	}
		echo '</table>';
		echo '</div>';
	}
	/*
	showAsTable(80);
	showAsTable(100);
	showAsTable(120);
	*/

	function bpmKeys($bpm, $key){
		$eighty = $GLOBALS['eighty'];
		$hundred = $GLOBALS['hundred'];
		$huntwenty = $GLOBALS['huntwenty'];
		if($bpm == 80){
			$chosebpm = $eighty;
		}
		if ($bpm == 100) {
			$chosebpm = $hundred;
		}
		if ($bpm == 120) {
			$chosebpm = $huntwenty;
		}
		if($key == 1){
			$offset = 0;
		}
		if($key == 2){
			$offset = 3;
		}
		if($key == 3){
			$offset = 6;
		}
		if($key == 4){
			$offset = 9;
		}
		if($key == 5){
			$offset = 12;
		}
		$keycolour = array();
		
		//first 3 is key 1 then 19-21.
		//loop through eighty scan the first 3 and store it to array then jump to 19
		while ($offset < count($chosebpm)) {
			for ($j=$offset; $j < $offset +3; $j++) { 
				array_push($keycolour, $chosebpm[$j]);
			}
			$offset+=15;
		}

		echo '<br>';
		echo '<br>';
		//print_r($keycolour);

		$colour = $GLOBALS['colour'];
		/*
		for ($k=0; $k <= count($colour) -1; $k++) { 
			$col[$k] = 0;
		}

		for ($i=0; $i <= count($colour) -1; $i++) {
				$check = $colour[$i]; 
			for ($b= 0; $b <= count($keycolour) -1; $b++) { 
				if ($keycolour[$b] == $check) {
					$col[$i] +=1;
				}
			}
		}
		echo '<div id = "tables">';
		echo 'Beats Per Minute: '.$bpm.' & key: '.$key.'';
		
		echo '<table>
			<tr> 
				<td> colour</td>
				<td> #</td>
					</tr>
		';

		for ($i=0; $i < count($colour) - 2 ; $i++) { 
			echo '	
					
					<tr>
						<td>'.$colour[$i].'</td>
						<td>'.$col[$i].'</td>
					</tr>
			 ';	
	}
		echo '</table>'; 
		echo '</div>';*/
	}


	bpmKeys(80, 1);
	/*bpmKeys(80, 2);
	bpmKeys(80, 3);
	bpmKeys(80, 4);
	bpmKeys(80, 5);
	bpmKeys(100, 1);
	bpmKeys(100, 2);
	bpmKeys(100, 3);
	bpmKeys(100, 4);
	bpmKeys(100, 5);
	bpmKeys(120, 1);
	bpmKeys(120, 2);
	bpmKeys(120, 3);
	bpmKeys(120, 4);
	bpmKeys(120, 5);
	*/


	//ed grouping data
	/*How many times each word appears on 80bpm
	  how many times each word appears on 100bpm
	  how many times each word appears on 120bpm
		
	  how colour changes for a certain key on tempo change
	  for 80bpm 1-3 10-13 will be key 1
	  after youve grouped keys for all 3 beats.


	*/

	/*
	song key 1 --> colour1, colour2, colour3, 
	song key 1 --> colour1, colour2, colour3,
	song key 2 --> colour1, colour2, colour3,
	song key 2 --> colour1, colour2, colour3,
	*/
	//end printing data//
	/*
	which colours correspond to which keys
	group them together according to keys
	count how many times each colour comes up for each key
	frequency analysis
	for both colour and feelings.
	rhythm extraction
	*/