<?php
  $mysqli=mysqli_connect("url", "username", "password", "username");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
?>
<html>
<head>

</head>

<body>

	<?php 
		$eighty = mysqli_query($mysqli,"SELECT * FROM bpmfeelings WHERE bpm=80");
		$hundred = mysqli_query($mysqli,"SELECT * FROM bpmfeelings WHERE bpm=100");
		$huntwenty = mysqli_query($mysqli,"SELECT * FROM bpmfeelings WHERE bpm=120");


		$feeling = array();
		$item_eighty = array();
		$item_hundred = array();
		$item_huntwenty = array();

		while($item_80 = mysqli_fetch_assoc($eighty)){
		array_push($feeling, $item_80['feeling']);
		array_push($item_eighty, $item_80['total']);
		}
		while($item_100 = mysqli_fetch_assoc($hundred)){
			array_push($item_hundred, $item_100['total']);
		}
		while($item_120 = mysqli_fetch_assoc($huntwenty)){
			array_push($item_huntwenty, $item_120['total']);
		}

		echo '<br>';
		echo '<br>';
		print_r($feeling);
		echo '<hr>';
		echo '<br>';
		echo '<br>';
		echo '80 bpm';
		echo '<br>';
		print_r($item_eighty);
		echo '<hr>';
		echo '<br>';
		echo '<br>';
		echo '100 bpm';
		echo '<br>';
		print_r($item_hundred);
		echo '<hr>';
		echo '<br>';
		echo '<br>';
		echo '120 bpm';
		echo '<br>';
		print_r($item_huntwenty);
		echo '<hr>';

		function array_key_value($value){
			$feeling = $GLOBALS['feeling'];
			$total_colour = array();
			$my_value = $value;
			for ($i=0; $i < count($feeling); $i++) {
				$total_colour[$feeling[$i]] = $value[$i];
			}
			return $total_colour;
		}

		function print_array($to_print){
			$i = 0;
			$my_print = $to_print;
			echo '<table border = "1">';
			foreach ($to_print as $key => $val) {
    			//echo '['.$i.']';
    			echo '<tr>';
    			echo '<td>';
    			echo "$key";
				$i = $i + 1;
				echo '</td>';
				echo '<td>';
				echo "$val";
				echo '</td>';
				echo '</tr>';
			}
			echo '</table>';

			return $my_print;
		}

		function mostCommon($bpm){
			$feeling = $GLOBALS['feeling'];
			$item_eighty = $GLOBALS['item_eighty'];
			$item_hundred = $GLOBALS['item_hundred'];
			$item_huntwenty = $GLOBALS['item_huntwenty'];

			$item_eighty = array_key_value($item_eighty);
			$item_hundred = array_key_value($item_hundred);
			$item_huntwenty = array_key_value($item_huntwenty);
			arsort($item_eighty);
			arsort($item_hundred);
			arsort($item_huntwenty);
			if ($bpm == 80) {
				$output = array_slice($item_eighty, 0, 10);
			}
			if ($bpm == 100) {
				$output = array_slice($item_hundred, 0, 10);
			}
			if ($bpm == 120) {
				$output = array_slice($item_huntwenty, 0, 10);
			}
			echo '<br>';
			//print_array($item_eighty);
			//echo '<hr>';
			echo '<br>';
			echo 'the to 10 most common feeling for '.$bpm.' bpm are: ';
			print_array($output);
			echo '<hr>';
			
			return $output;
		}
		mostCommon(80);
		mostCommon(100);
		mostCommon(120);

		function totalKey($key_id){
			$feeling = $GLOBALS['feeling'];
			$mysqli = $GLOBALS['mysqli'];
			$eighty = mysqli_query($mysqli,"SELECT * FROM bpmFeelingId WHERE bpm=80 AND key_id = $key_id");
			$hundred = mysqli_query($mysqli,"SELECT * FROM bpmFeelingId WHERE bpm=100 AND key_id = $key_id");
			$huntwenty = mysqli_query($mysqli,"SELECT * FROM bpmFeelingId WHERE bpm=120 AND key_id = $key_id");

			$feeling = array();
			$item_eighty = array();
			$item_hundred = array();
			$item_huntwenty = array();
			$total = array();
			while($item_80 = mysqli_fetch_assoc($eighty)){
			array_push($feeling, $item_80['feeling'] );
			array_push($item_eighty, $item_80['total']);
			}
			while($item_100 = mysqli_fetch_assoc($hundred)){
			array_push($item_hundred, $item_100['total']);
			}
			while($item_120 = mysqli_fetch_assoc($huntwenty)){
				array_push($item_huntwenty, $item_120['total']);
			}
			for ($i=0; $i < count($feeling); $i++) { 
				$calculate = $item_eighty[$i] +$item_hundred[$i] + $item_huntwenty[$i];
				array_push($total, $calculate);
			}

			$item_all = array_key_value($total);
			echo'<br>';
			echo 'total count for key '.$key_id.'';
			echo'<br>';
			arsort($item_all);
			$output = array();
			$output = array_slice($item_all, 0, 10);
			print_array($output);
			echo '<hr>';
			return $item_all;
		}

		
		
		/*totalKey(1);
		totalKey(2);
		totalKey(4);
		totalKey(5);*/

		function feelingKeyAnalysis($key_1, $key_2){
			$found_difference = array();
			foreach ($key_2 as $key => $val) {
    			$select_feeling = "$key";
    			$select_val = "$val";
				foreach ($key_1 as $key_2 => $val_2) {
    				if ($select_feeling == "$key_2") {
    						$difference = $select_val - "$val_2";
    					if ($difference > 0) {
    						$found_difference[$select_feeling] = $difference;
    					}
    					
    				}
				}
			}

			arsort($found_difference);
			print_array($found_difference);
			echo '<hr>';
			return $found_difference;

		}

		feelingKeyAnalysis(totalKey(1), totalKey(2));
		totalKey(3);
		feelingKeyAnalysis(totalKey(4), totalKey(5));


/*
		function feelingBpmAnalysis(){
			$eighty_100 = array();
			$eighty_120 = array();
			$total = array();
			$feeling = $GLOBALS['feeling'];
			$item_eighty = $GLOBALS['item_eighty'];
			$item_hundred = $GLOBALS['item_hundred'];
			$item_huntwenty = $GLOBALS['item_huntwenty'];

			for ($i=0; $i < count($feeling) ; $i++) { 
				$minus = $item_hundred[$i] - $item_eighty[$i];
				array_push($eighty_100, $minus);
				$minus = $item_huntwenty[$i] - $item_hundred[$i];
				array_push($eighty_120, $minus);
				$minus = $item_huntwenty[$i] - $item_eighty[$i];
				array_push($total, $minus);
			}

			echo '<br>';
			echo '<br>';
			
			$feeling_total = array();
			$feeling_total = array_key_value($total);
			asort($feeling_total);
			print_array($feeling_total);

			return $feeling_total;
		}

		feelingBpmAnalysis();
		echo '<hr>';
*/

	?>

</body>
</html>

<?php

mysqli_close($mysqli);
?>
