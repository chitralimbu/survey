
<?php
  $mysqli=mysqli_connect("url", "username", "Password", "username");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
?>

<html>
<head>
<?php 
	
	$eighty = mysqli_query($mysqli,"SELECT * FROM colours WHERE bpm=80");
	$hundred = mysqli_query($mysqli,"SELECT * FROM colours WHERE bpm=100");
	$huntwenty = mysqli_query($mysqli,"SELECT * FROM colours WHERE bpm=120");
	
	$colour = array();
	$item_eighty = array();
	$item_hundred = array();
	$item_huntwenty = array();

	$eighty_100 = array();
	$eighty_120 = array();
	$total = array();

	while($item_80 = mysqli_fetch_assoc($eighty)){
		array_push($colour, $item_80['colour']);
		array_push($item_eighty, $item_80['total']);
	}
	while($item_100 = mysqli_fetch_assoc($hundred)){
		array_push($item_hundred, $item_100['total']);
	}
	while($item_120 = mysqli_fetch_assoc($huntwenty)){
		array_push($item_huntwenty, $item_120['total']);
	}
	/*
	print_r($item_eighty);
	echo'<br>';
	print_r($item_hundred);
	echo'<br>';
	print_r($item_huntwenty);
	*/
	for ($i=0; $i < count($colour) ; $i++) { 
		$minus = $item_hundred[$i] - $item_eighty[$i];
		array_push($eighty_100, $minus);
		$minus = $item_huntwenty[$i] - $item_hundred[$i];
		array_push($eighty_120, $minus);
		$minus = $item_huntwenty[$i] - $item_eighty[$i];
		array_push($total, $minus);
	}

	print_r($eighty_100);
	echo'<br>';
	echo'<br>';
	print_r($eighty_120);
	echo'<br>';
	echo'<br>';
	print_r($total);

	$total_colour = array();

	for ($i=0; $i < count($colour); $i++) { 
		$total_colour[$colour[$i]] = $eighty_100[$i];
	}
	echo'<br>';
	echo'<br>';
	//sort in ascending order
	asort($total_colour);
	$i = 0;
	echo 'selected';
	echo '<table border = "1">';
	foreach ($total_colour as $key => $val) {
    echo '<tr>';
    //echo '<td>'.$i.' </td>';
    echo '<td>';
    echo "$key";
    echo '</td>';
    echo '<td>';
    echo "$val";
    echo '</td>';
	$i = $i + 1;
	echo '</tr>';
	}
	echo '</table>';

	$hue = mysqli_query($mysqli,"SELECT hue FROM hsl");
	$sat = mysqli_query($mysqli,"SELECT saturation FROM hsl");
	$light = mysqli_query($mysqli,"SELECT lightness FROM hsl");

	$item_hue = array();
	$item_sat = array();
	$item_light = array();

	while($my_hue = mysqli_fetch_assoc($hue)){
		array_push($item_hue, $my_hue['hue']);
	}
	while($my_sat = mysqli_fetch_assoc($sat)){
		array_push($item_sat, $my_sat['saturation']);
	}
	while($my_light = mysqli_fetch_assoc($light)){
		array_push($item_light, $my_light['lightness']);
	}

	//sorted hue according to the difference found earlier.
	$sorted_hue = array();
	$sorted_sat = array();
	$sorted_light = array();
	//$flipped_total = array_flip($total_colour);
	foreach ($total_colour as $key => $val) {
			$selected = "$key";
    	for ($i=0; $i < count($colour); $i++) { 
    		if ($colour[$i] == $selected) {
    			array_push($sorted_hue, $item_hue[$i]);
    			array_push($sorted_sat, $item_sat[$i]);
    			array_push($sorted_light, $item_light[$i]);

    		}
    	}
    }
	echo'<br>';
	echo'<br>';
	print_r($sorted_hue);
	echo'<br>';
	echo'<br>';
	print_r($sorted_sat);
	echo'<br>';
	echo'<br>';
	print_r($sorted_light);

	//calculating what happens to hue sat and light when data shows increase in slection
	$count = 0;
	$counter = 0;
	$hue_decrease = 0;
	$sat_decrease = 0;
	$light_decrease = 0;
	$hue_increase = 0;
	$sat_increase = 0;
	$light_increase = 0;
	$negative_count = 0;
	$positive_count = 0;
	foreach ($total_colour as $key => $value) {
		if ("$value" < 0) {
			$hue_decrease = $hue_decrease + $sorted_hue[$counter];
			$sat_decrease = $sat_decrease + $sorted_sat[$counter];
			$light_decrease = $light_decrease + $sorted_light[$counter];
			$counter+=1;
			$negative_count = $negative_count + 1;
			
		}


		if ("$value" > 0) {
			$counter+=1;
			$positive_count = $positive_count + 1;
			$hue_increase = $hue_increase + $sorted_hue[$counter];
			$sat_increase = $sat_increase + $sorted_sat[$counter];
			$light_increase = $light_increase + $sorted_light[$counter];

		}

	}
	echo'<br>';
	echo'<br>';
	echo '<table border = 1>';
echo '<td>';
	echo 'RED_decrease:';
	echo '</td>';
	echo '<td>';
echo $hue_decrease / $negative_count;
	echo '</td>';
	echo '</tr>';
	echo '<tr>';
	echo '<td>';
	echo 'GREEN_decrease: ';
	echo '</td>';
	echo '<td>';
echo $sat_decrease / $negative_count;
	echo '</td>';
	echo '</tr>';
	echo '<tr>';
	echo '<td>';
	echo 'BLUE_decrease: ';
	echo '</td>';

	echo '<td>';
	echo $light_decrease / $negative_count;
	echo '</td>';
	echo '</tr>';
	echo '<tr>';
	echo '<td>';
	echo 'RED_increase: ';
	echo '</td>';
	echo '<td>';
echo $hue_increase / $positive_count;
	echo '</td>';
	echo '</tr>';
	echo '<tr>';
	echo '<td>';
	echo 'GREEN_increase: ';
	echo '</td>';
	echo '<td>';
echo $sat_increase / $positive_count;
	echo '</td>';
	echo '</tr>';
	echo '<tr>';
	echo '<td>';
	echo 'BLUE_increase: ';
	echo '</td>';
	echo '<td>';
	echo $light_increase / $positive_count;
	echo '</td>';
	echo '</tr>';
	echo '<table>';
	function array_key_value($value){
		$colour = $GLOBALS['colour'];
		$total_colour = array();
		$my_value = $value;
		for ($i=0; $i < count($colour); $i++) {
			$total_colour[$colour[$i]] = $value[$i];
		}
		return $total_colour;
	}

	function print_array($to_print){
			$i = 0;
			$my_print = $to_print;
			echo '<table border ="1">';
			
		foreach ($to_print as $key => $val) {
    		echo '<tr>';
    		echo '<td>';
    		echo "$key";
    		echo '</td>';
    		echo '<td>';
    		echo "$val";
    		echo '</td>';
    			echo '</tr>';
			$i = $i + 1;

		}
	
		echo '</table>';
		echo '<br>';
		return $my_print;
	}

	function hueSort($to_sort){
		$item_hue = $GLOBALS["item_hue"];
		$colour = $GLOBALS['colour'];
		$sorted_hue = array();

		foreach ($to_sort as $key => $val) {
			$selected = "$key";
    	for ($i=0; $i < count($colour); $i++) { 
    		if ($colour[$i] == $selected) {
    			array_push($sorted_hue, $item_hue[$i]);
    			}
    		}
    	}

    	return $sorted_hue;
	}

	function satSort($to_sort){
		$item_sat = $GLOBALS["item_sat"];
		$colour = $GLOBALS['colour'];
		$sorted_sat = array();

		foreach ($to_sort as $key => $val) {
			$selected = "$key";
    	for ($i=0; $i < count($colour); $i++) { 
    		if ($colour[$i] == $selected) {
    			array_push($sorted_sat, $item_sat[$i]);
    			}
    		}
    	}

    	return $sorted_sat;
	}

	function lightSort($to_sort){
		$item_light = $GLOBALS["item_light"];
		$colour = $GLOBALS['colour'];
		$sorted_light = array();

		foreach ($to_sort as $key => $val) {
			$selected = "$key";
    	for ($i=0; $i < count($colour); $i++) { 
    		if ($colour[$i] == $selected) {
    			array_push($sorted_light, $item_light[$i]);

    			}
    		}
    	}

    	return $sorted_light;
	}

	function calculateAverage($hsl, $posNeg, $colour_count){
		$selectedHsl = $hsl;
		$pos_neg = $posNeg;
		$count_colour = $colour_count;
		$counter = 0;
		$negative_count = 0;
		$positive_count = 0;
		$increase = 0;
		$decrease = 0;

		$increased_avg = 0;
		$decreased_avg = 0;

		foreach ($count_colour as $key => $value) {
				if ("$value" < 0) {
					$decrease = $decrease + $selectedHsl[$counter];
					$negative_count = $negative_count + 1;
					/*echo '<br>';
					echo $counter;
					echo ' '.$selectedHsl[$counter];*/
					$counter+=1;
				}
				if ("$value" == 0 ) {
					$counter+=1;
				}
				if ("$value" > 0) {
				
				
				$positive_count = $positive_count + 1;
				$increase = $increase + $selectedHsl[$counter];
				/*echo '<br>';
				echo $counter;
				echo ' '.$selectedHsl[$counter];*/
				$counter+=1;
				}


		}

		$decreased_avg = $decrease / $negative_count;
		$increased_avg = $increase / $positive_count;
		/*echo '</br>';
		echo $negative_count;
		echo '</br>';*/
		if ($pos_neg == "negative") {
			return $decreased_avg;
		}
		if ($pos_neg == "positive") {
			return $increased_avg;
		}
	}

	function bpmKeyAnalysis($key_id){
		echo 'hello' . $key_id;
		$e_80 = array();
		$h_100 = array();
		$h_120 = array();
		$mysqli = $GLOBALS["mysqli"];
		$eighty = mysqli_query($mysqli,"SELECT * FROM bpmColourId WHERE bpm=80 AND Key_id = $key_id");
		$hundred = mysqli_query($mysqli,"SELECT * FROM bpmColourId WHERE bpm=100 AND Key_id = $key_id");
		$huntwenty = mysqli_query($mysqli,"SELECT * FROM bpmColourId WHERE bpm=120 AND Key_id = $key_id");
		while($item_80 = mysqli_fetch_assoc($eighty)){
				array_push($e_80, $item_80['total']);
		}
		
		while($item_100 = mysqli_fetch_assoc($hundred)){
				array_push($h_100, $item_100['total']);
		
		}
		while($item_120 = mysqli_fetch_assoc($huntwenty)){
				array_push($h_120, $item_120['total']);
		
		}
		$colour = $GLOBALS['colour'];
		$item_hue = $GLOBALS['item_hue'];
		$item_sat = $GLOBALS['item_sat'];
		$item_light = $GLOBALS['item_light'];

		$eighty_100 = array();
		$eighty_120 = array();

		for ($i=0; $i < count($colour); $i++) { 

			$eighty_hundred = $h_100[$i] - $e_80[$i];
			array_push($eighty_100, $eighty_hundred);
			$eighty_huntwenty = $h_120[$i] - $e_80[$i];
			array_push($eighty_120, $eighty_huntwenty);
		}

		echo '<table border = "1">';
		$colour_eighty_huntwenty = array_key_value($eighty_120);
		asort($colour_eighty_huntwenty);
		echo '<br>';
		echo '<br>';
		echo '<br>';
		$sorted_hue = hueSort($colour_eighty_huntwenty);
		$sorted_sat = satSort($colour_eighty_huntwenty);
		$sorted_light = lightSort($colour_eighty_huntwenty);
		print_array($colour_eighty_huntwenty);
		echo '<br>';
		echo '<br>';
		print_r($sorted_hue);
		echo '<br>';
		echo '<br>';
		print_r($sorted_sat);
		echo '<br>';
		echo '<br>';
		print_r($sorted_light);
		echo '<hr>';
		echo 'showing the average increase and derease of huse saturation and light from 80- 120 bpm when key id = '.$key_id.'';
		echo '<br>';
		echo '<br>';
		//hue increase
		echo '<tr>';
		echo '<td>';
		echo 'red increase';
		echo '</td>';
		echo '<td>';
		echo calculateAverage($sorted_hue, "positive", $colour_eighty_huntwenty);
				echo '</td>';
		echo '</tr>';
		//hue decrease
				echo '<tr>';
		echo '<td>';
		echo 'red decrease';
		echo '</td>';
		echo '<td>';
		echo calculateAverage($sorted_hue, "negative", $colour_eighty_huntwenty);
		echo '</td>';
		echo '</tr>';
		//sat increase

				echo '<tr>';
		echo '<td>';
		echo 'green increase';
		echo '</td>';
echo '<td>';
		echo calculateAverage($sorted_sat, "positive", $colour_eighty_huntwenty);
		echo '</td>';
		echo '</tr>';
		//sat decrease

				echo '<tr>';
		echo '<td>';
		echo 'green decrease';
		echo '</td>';
echo '<td>';
		echo calculateAverage($sorted_sat, "negative", $colour_eighty_huntwenty);
		echo '</td>';
		echo '</tr>';
		//light increase

				echo '<tr>';
		echo '<td>';
		echo 'blue increase';
		echo '</td>';
echo '<td>';
		echo calculateAverage($sorted_light, "positive", $colour_eighty_huntwenty);
		echo '</td>';
		echo '</tr>';
		//light decrease

				echo '<tr>';
		echo '<td>';
		echo 'blue decrease';
		echo '</td>';
		echo '<td>';
		echo calculateAverage($sorted_light, "negative", $colour_eighty_huntwenty);
		echo '</td>';
		echo '</tr>';
		echo '<hr>';
		echo '</table>';
	}
	bpmKeyAnalysis(1);
	bpmKeyAnalysis(2);
	bpmKeyAnalysis(3);
	bpmKeyAnalysis(4);
	bpmKeyAnalysis(5);
?>
</head>

<body>

</body>
</html>


<?php

mysqli_close($mysqli);
?>
