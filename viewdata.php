
<?php
  $mysqli=mysqli_connect("ephesus.cs.cf.ac.uk", "c1327916", "dharanboi1995", "c1327916");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
?>

<html>
<head>
<style type="text/css">
	table {
		border-collapse: collapse;
	}
	table, th, td {
		border: 1px solid black;
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
	$Colour1 = array("zero");
	$Colour2 = array("zero");
	$Colour3 = array("zero");
	$id = array("zero");
	$key = array("zero");

	$colour = array("white","green","orange","red","blue","brown","skyblue","gray","mauve","indigo","purple","silver","sand colour","light red","black","yellow","rose pink","scarlet","","");
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

		array_push($Colour1, $items['Colour1']);
		array_push($Colour2, $items['Colour2']);
		array_push($Colour3, $items['Colour3']);
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
		$Colour1 = $GLOBALS['Colour1'];
		$Colour2 = $GLOBALS['Colour2'];
		$Colour3 = $GLOBALS['Colour3'];
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
					array_push($beatsperm, $Colour1[$i]);
					array_push($beatsperm, $Colour2[$i]);
					array_push($beatsperm, $Colour3[$i]);
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
		$colour = $GLOBALS['colour'];
		for ($k=0; $k < count($colour) -1; $k++) { 
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
		
		for ($i=0; $i <count($colour)-1; $i++) {
				$check = $colour[$i]; 
			for ($j= 0; $j <= count($bpm)-1; $j++) { 
				if ($bpm[$j] == $check) {
					$col[$i] +=1;
				}
			}
		}
		return $col;
	}
	
	/*function insertBpmTotal($bpm){
		$counted = countColour($bpm); 
		$colour = $GLOBALS['colour'];
		$mysqli = $GLOBALS['mysqli'];
		for ($i=0; $i < count($colour) -2; $i++) { 
			$my_count = $counted[$i];
			$my_colour = $colour[$i];
			$sql = "INSERT INTO colours (bpm, colour, total)
			VALUES ('$bpm', '$my_colour', '$my_count')";
	
			if ($mysqli->query($sql) === TRUE) {
    			echo "New record created successfully";
			} else {
    			echo "Error: " . $sql . "<br>" . $mysqli->error;
				}
		}
		
	}

	insertBpmTotal(80);
	insertBpmTotal(100);
	insertBpmTotal(120);
	*/

	//show data as table just beat
	function showAsTable($bpm){
		$counted = countColour($bpm);
		$colour = $GLOBALS['colour'];
		echo '<div id ="tables1">';
		echo ''.$bpm.' bpm';
		echo '<table>';
		for ($i=0; $i < count($colour) - 2 ; $i++) { 
			echo '
					<tr><td>'.$colour[$i].'</td>
						<td>'.$counted[$i].'</td>
					</tr>
			 ';	
	}
		echo '</table>';
		echo '</div>';
		return $counted;
	}
	
	showAsTable(80);
	showAsTable(100);
	showAsTable(120);
	

	function getIdBpm($key){
		$ColourforID = array();
		$mysqli = $GLOBALS['mysqli'];
		$query = mysqli_query($mysqli,"SELECT * FROM survey_2 WHERE Song_key = $key");
 			$id_count=array();
 			while($fetching = mysqli_fetch_assoc($query)){
 				array_push($ColourforID, $fetching['Colour1']);
 				array_push($ColourforID, $fetching['Colour2']);
 				array_push($ColourforID, $fetching['Colour3']);
 			}

 			return $ColourforID;
	}

	function groupByKey($keys){
		$byKey = getIDBpm($keys);
		$bpmByKey = array();
		$colour = $GLOBALS['colour'];
		for ($i=0; $i < count($colour) ; $i++) { 
			$bpmByKey[$i] = 0;
		}
		for ($j=0; $j < count($colour) ; $j++) { 
			$check = $colour[$j];
			 for ($k=0; $k < count($byKey) ; $k++) { 
			 	if ($byKey[$k] == $check ) {
			 		$bpmByKey[$j]+=1;
			 	}
			 }
		}
		return $bpmByKey;

	}
	//find total for each colour
	//display as table()

	function displayTable($key_again){
		$colour = $GLOBALS['colour'];
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
		for ($i=0; $i < count($colour)-2; $i++) { 
			echo '<tr> <td>'.$colour[$i].'</td>
				<td>'.$bpmKey[$i].'</td>
			</tr>';
		}
		echo '</table>';
		echo '</div>';
		//sql to add to database
		$mysqli = $GLOBALS['mysqli'];
		/*
		for ($a=0; $a < count($colour) -2 ; $a++) { 
			$select_colour = $colour[$a];
			$select_total = $bpmKey[$a];
			$sql = "INSERT INTO bpmColourId (bpm, Key_id, colour, total)
			VALUES ('$bpm', '$song_key', '$select_colour', '$select_total')";
	
			if ($mysqli->query($sql) === TRUE) {
    			//echo "New record created successfully";
			} else {
    			echo "Error: " . $sql . "<br>" . $mysqli->error;
				}
		}*/
		return $bpmKey;
	}
	for ($i=1; $i < 16 ; $i++) { 
		displayTable($i);
	}

	//add hue saturation lightness
	function addHSL(){
		$mysqli = $GLOBALS['mysqli'];
		$colours = array("white","green","orange","red","blue","brown","skyblue","gray","mauve","indigo","purple", "silver", "sand colour", "light red", "black", "yellow", "rose pink", "scarlet");
		$hex = array("#FFFFFF","#00FF00","#FFA500","#FF0000","#0000FF","#A52A2A","#87CEEB","#808080","#CC99FF","#2E0854","#800080","#C0C0C0","#C2B280","#FF4D4D","#000000","#FFFF00","#FF66CC","#FF2400");
		$hue = array("255","0","255","255","0","165","135","128","204","46","128","192","194","255","0","255","255","255");
		$saturation = array("255","255","165","0","0","42","206","128","153","8","0","192","178","77","0","255","102","36");
		$lightness = array("255","0","0","0","255","42","235","128","255","54","128","192","128","77","0","0","204","0");

		for ($i=0; $i < count($colours); $i++) { 
			$my_colour = $colours[$i];
			$my_hex = $hex[$i];
			$my_hue = $hue[$i];
			$my_saturation = $saturation[$i];
			$my_lightness = $lightness[$i];
			$sql = "INSERT INTO hsl (colour, hex, hue, saturation, lightness)
			VALUES ('$my_colour', '$my_hex', '$my_hue', '$my_saturation','$my_lightness')";
	
			if ($mysqli->query($sql) === TRUE) {
    			//echo "New record created successfully";
			} else {
    			echo "Error: " . $sql . "<br>" . $mysqli->error;
				}
		}
	}

	//addHSL();
	?>
	<?php
mysqli_close($mysqli);
?>
<body>

</body>
</html>