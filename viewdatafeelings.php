
<?php
  $mysqli=mysqli_connect("ephesus.cs.cf.ac.uk", "c1327916", "dharanboi1995", "c1327916");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
?>

<html>
<head>
<style type="text/css">
	
	body {
		font-size: 15px;
	}
	table {
		border-collapse: collapse;
	}
	table, th, td {
		border: 1px solid black;
		font-size: 15px;
		width: 200px;
	}

	#tables{
		float: left;
		margin: 10px;
	}
	#tables1{
		float: left;
		margin: 10px;
	}
</style>
</head>
	<?php 
	$Feeling1 = array("zero");
	$Feeling2 = array("zero");
	$Feeling3 = array("zero");
	$id = array("zero");
	$key = array("zero");

	$colour = array("white","green","orange","red","blue","brown","skyblue","gray","mauve","indigo","purple","silver","sand colour","light red","black","yellow","rose pink","scarlet","","");
	$feelings = array("RUGGED", "ENERGETIC", "RADIENT", "WARM", "JOYOUS", "DEEP", "HAPPY", "BRILLIANT", "ALERT", "RURAL", "MERRY", "SIMPLE", "NAIVE", "FRANK", "FLAT", "ORDINARY", "SERIOUS", "BRUTAL", "SINISTER", "SAVAGE", "SAD", "ADGITATED", "RUSTIC", "OUTDOOR", "NOBLE", "ELEGENT", "GRACEFUL", "VIGOROUS", "BRAVE", "GENTLE", "CARESSING", "SELF-IMPORTANT", "CHARMING", "EVEN-TEMPERED", "CALM", "CONCENTRATED", "SORROW", "SHY", "GLOOMY", "DRAMATIC", "VIOLENT", "HUMOURLESS", "UNFRIENDLY", "FUNEREAL", "MYSTERIOUS", "PROFOUND", "DOLEFUL", "ANXIOUS", "SILLY", "PEACEFUL", "NOTHING", "ESCAPE", "LONGING", "HEAVY", "MELODRAMATIC", "REJOICE","","");
	$index = 1;
	//count number of columns//
	$query = mysqli_query($mysqli,"SELECT ID FROM survey_2");
 			$id_count=array();
 			while($fetching = mysqli_fetch_assoc($query)){
 				array_push($id_count, $fetching['ID']);
 			}
 			
 			$column = count($id_count);
 			echo $column;
 	//finish counting columns//
 	//begin retrieving data//
	for($i=0; $i<= $column; $i++){
	$result = mysqli_query($mysqli,"SELECT * FROM survey_2 WHERE ID = $index");
	while($items = mysqli_fetch_assoc($result)){
		array_push($Feeling1, $items['Feeling1']);
		array_push($Feeling2, $items['Feeling2']);
		array_push($Feeling3, $items['Feeling3']);
		array_push($id, $items['ID']);
		array_push($key, $items['Song_key']);
			}
		$index +=1;
		}
		echo'<br>';
		//print_r($Colour1);
		//echo'<br>';
		//echo sizeof($Colour2);
		//echo'<br>';
		//echo sizeof($Colour3);

	///grouping data
	function groupBpm($bpm){
		$key = $GLOBALS['key'];
		$Feeling1 = $GLOBALS['Feeling1'];
		$Feeling2 = $GLOBALS['Feeling2'];
		$Feeling3 = $GLOBALS['Feeling3'];
		$beatsperm = array();
		if($bpm == 80){
			$offset = 1;
		}
		if($bpm == 100){
			$offset = 2;
		}
		if ($bpm == 120) {
			$offset = 3;
		}
		for($i=0; $i <= count($key) -1; $i++){
			if ($key[$i] == $offset || $key[$i] == $offset + 3 || $key[$i] == $offset + 6 || $key[$i] == $offset + 9 || $key[$i] == $offset + 12 ) {
					array_push($beatsperm, $Feeling1[$i]);
					array_push($beatsperm, $Feeling2[$i]);
					array_push($beatsperm, $Feeling3[$i]);
		}
	}
	return $beatsperm;
	}

	$eighty = groupBpm(80);
	$hundred = groupBpm(100);
	$huntwenty = groupBpm(120);
	


	/*
	echo '<br>';
	echo '<br>';
	print_r($eighty);
	echo '<br>';
	echo '<br>';
	print_r($hundred);
	echo '<br>';
	echo '<br>';
	print_r($huntwenty);
	echo '<br>';
	echo '<br>';
	*/
	function countColour($beatpm){
		$eighty = $GLOBALS['eighty'];
		$hundred = $GLOBALS['hundred'];
		$huntwenty = $GLOBALS['huntwenty'];
		$Feeling = $GLOBALS['feelings'];
		for ($k=0; $k < count($Feeling) -1; $k++) { 
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
		
		for ($i=0; $i <count($Feeling)-1; $i++) {
				$check = $Feeling[$i]; 
			for ($j= 0; $j <= count($bpm)-1; $j++) { 
				if ($bpm[$j] == $check) {
					$col[$i] +=1;
				}
			}
		}
		return $col;
	}

	function insertBpmTotal($bpm){
		$counted = countColour($bpm); 
		$feelings = $GLOBALS['feelings'];
		$mysqli = $GLOBALS['mysqli'];
		for ($i=0; $i < count($feelings) -2; $i++) { 
			$my_count = $counted[$i];
			$my_feeling = $feelings[$i];
			$sql = "INSERT INTO bpmfeelings (bpm, feeling, total)
			VALUES ('$bpm', '$my_feeling', '$my_count')";
	
			if ($mysqli->query($sql) === TRUE) {
    			echo "New record created successfully";
			} else {
    			echo "Error: " . $sql . "<br>" . $mysqli->error;
				}
		}
		
	}
//	insertBpmTotal(80);
//	insertBpmTotal(100);
//	insertBpmTotal(120);
	//show data as table just beat
	function showAsTable($bpm){
		$counted = countColour($bpm);
		$Feeling = $GLOBALS['feelings'];
		echo '<div id ="tables1">';
		echo ''.$bpm.' bpm';
		echo '<table>';
		for ($i=0; $i < count($Feeling) - 2 ; $i++) { 
			echo '
					<tr><td>'.$Feeling[$i].'</td>
						<td>'.$counted[$i].'</td>
					</tr>
			 ';	
	}
		echo '</table>';
		echo '</div>';
	}
	
	//showAsTable(80);
	//showAsTable(100);
	//showAsTable(120);
	


	function getIdBpm($key){
		$FeelingforID = array();
		$mysqli = $GLOBALS['mysqli'];
		$query = mysqli_query($mysqli,"SELECT * FROM survey_2 WHERE Song_key = $key");
 			$id_count=array();
 			while($fetching = mysqli_fetch_assoc($query)){
 				array_push($FeelingforID, $fetching['Feeling1']);
 				array_push($FeelingforID, $fetching['Feeling2']);
 				array_push($FeelingforID, $fetching['Feeling3']);
 			}

 			return $FeelingforID;
	}

	function groupByKey($keys){
		$byKey = getIDBpm($keys);
		$bpmByKey = array();
		$Feeling = $GLOBALS['feelings'];
		for ($i=0; $i < count($Feeling) ; $i++) { 
			$bpmByKey[$i] = 0;
		}
		for ($j=0; $j < count($Feeling) ; $j++) { 
			$check = $Feeling[$j];
			 for ($k=0; $k < count($byKey) ; $k++) { 
			 	if ($byKey[$k] == $check ) {
			 		$bpmByKey[$j]+=1;
			 	}
			 }
		}
		return $bpmByKey;

	}



	//display as table()

	function displayTable($key_again){
		$Feeling = $GLOBALS['feelings'];
		$bpmKey = groupByKey($key_again);
		echo '<div id ="tables">';
		if ($key_again == 1 || $key_again == 2 || $key_again == 3) {
			$song_key = 1;
		}
		if ($key_again == 4 || $key_again == 5 || $key_again == 6) {
			$song_key = 2;
		}
		if ($key_again == 7 || $key_again == 8 || $key_again == 9) {
			$song_key = 3;
		}
		if ($key_again == 10 || $key_again == 11 || $key_again == 12) {
			$song_key = 4;
		}
		if ($key_again == 13 || $key_again == 14 || $key_again == 15) {
			$song_key = 5;
		}
		if ($key_again == 1 || $key_again == 4 || $key_again == 7 || $key_again == 10  || $key_again == 13 ) {
			$bpm = 80;
		}
		if ($key_again == 2 || $key_again == 5 || $key_again == 8 || $key_again == 11  || $key_again == 14  ) {
			$bpm = 100;
		}
		if ($key_again == 3 || $key_again == 6 || $key_again == 9 || $key_again == 12 || $key_again == 15  ) {
			$bpm = 120;
		}
		echo 'BPM: '.$bpm.' & key_id '.$song_key.'';
		echo '<table>';
		for ($i=0; $i < count($Feeling)-2; $i++) { 
			echo '<tr> <td>'.$Feeling[$i].'</td>
				<td>'.$bpmKey[$i].'</td>
			</tr>';
		}
		echo '</table>';
		echo '</div>';
		/*
		$mysqli = $GLOBALS['mysqli'];
			for ($a=0; $a < count($Feeling) -2 ; $a++) { 
			$select_Feeling = $Feeling[$a];
			$select_total = $bpmKey[$a];
			$sql = "INSERT INTO bpmFeelingId (bpm, Key_id, feeling, total)
			VALUES ('$bpm', '$song_key', '$select_Feeling', '$select_total')";
	
			if ($mysqli->query($sql) === TRUE) {
    			echo "New record created successfully";
			} else {
    			echo "Error: " . $sql . "<br>" . $mysqli->error;
				}
		}*/
	}
	
	for ($i=1; $i < 16 ; $i++) { 
		displayTable($i);
	}

	?>
<body>

</body>
</html>