
<?php
  $mysqli=mysqli_connect("URL", "username", "password", "username");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
?>

<html>
	<head>
		<style>
		body 
{		font-family:Sans-serif;
		color: black;
		background-color: gray;
			}

		table, th, td {
			table-layout: fixed;
			border: 1px solid black;
			border-collapse: collapse;
			margin: 10px;
			padding: 5px;
		}

		#header{
			margin-bottom: 5px;
		}
		table#color_table{

			font-size: 15px;
			font-weight: bold;
			margin-left: -10px;
			width: 1000px;
		}

		#color_table tr, td{
			border: 1px solid white;
			text-align: center;
			height: 50px;

		}
		
		table#feel_table  {
			font-size: 12px;
			font-weight: bold;
			margin-top: -7px;
			margin-left: -10px;
			width: 1000px;
			color: black;	
		}

		#feel_table tr, td{
			height: 30px;
		}
	
		
		.comments_textbox{
			border-radius: 10px;
			height: 100px;
			width: 220px;
			font-size: 20px;
		}


		.submitButton, #showfeelings{
			width: 1000px;
			font-family:Courier New, monospace;
			border-radius: 20px;
			font-size: 20px;
			background:#C0C0C0;
			margin: 5px;
			padding: 10px;
			color: black;
		}

		#showfeelings{
			width: 980px;
		}

		#button{
			width: 1000px;
			margin: auto;
		}
		#feelings{
			border: 1px solid black;
		}


		

		#sub1{
			display: none;
		}

		#feeling_box{
			margin: 5px;
			padding: 10px;
			font-size: 20px;
			color:white;
		}

		.textbox { 
    		background: transparent url(http://html-generator.weebly.com/files/theme/input-text-8.png) repeat-x; 
    		border: 1px solid #999; 
    		outline:0; 
    		height:25px; 
    		width: 240px; 
 		} 

 		.textarea{
 			background: transparent url(http://html-generator.weebly.com/files/theme/input-text-8.png) repeat-x repeat-y; 
 			border: 1px solid #999; 
    		outline:0; 

 		}
 		h1{
 			font-size: 30px;
 			display: inline-block;
 			background: #C0C0C0;
 			margin: 0px;
 			padding: 10px;

 		}

 		#colour_section{
 			background-color: white;
 			margin-top:-5px; 
 			padding: 10px;
 			padding-bottom: 0.5px;

 		}	

 		#title{
 			text-align: center;
 			width: 990px;
 			background: #d3d3d3 ;
 			font-size: 15px;
 			font-weight: bold;
 			padding: 5px;
 			margin: -10px;
 		}

 		#feeling_section{
 			width: 980px;
 			margin: auto;
 			background-color: white;
 			padding: 10px;
 		}

 		#music_section{
 			float: left;
 			color: #C0C0C0;
 			margin: auto;
 			width: 1000px;
 			height: 100px;
 		}

 		audio{
 			width: 800px;
 		}

 		#mainbody{
 			width:1000px;
 			margin: auto;
 			height: auto;
 		}

 		#wrapper{
 			width: 1000px;
 			margin: auto;
 			margin-bottom: -45px;
 			padding: 5px;
 			padding-left: 15px;
 			padding-right: 15px;
 			background:#d3d3d3 ;
 			border-radius: 5px;
 			 box-shadow: 5px 5px 5px #888888;
 		}	

 		.colorbox{
 			width: 100px;
 			height: 50px;
 		}

 		#heading, #music_section{
 			float: left;
 			display: inline-block;
 		}

 		#heading{
 			font-size: 17px;
 			font-weight: bold;
 			margin-top: -6px;
 			width: 150px;
 			height: 30px;
 		}
		</style>
		<script type="text/javascript">
			function SwitchMenu(obj){
  			if(document.getElementById){
  				var el = document.getElementById(obj);
  				var ar = document.getElementById("masterdiv").getElementsByTagName("span"); //DynamicDrive.com change
    			if(el.style.display != "block"){ //DynamicDrive.com change
      				for (var i=0; i<ar.length; i++){
        				if (ar[i].className=="submenu") //DynamicDrive.com change
        				ar[i].style.display = "none";
      				}
      				el.style.display = "block";
    			}else{
      			el.style.display = "none";
    				}
  				}
			}

			
		</script>
		<script type="text/javascript">

		/////begin checkbox limit

			/***********************************************
* Limit number of checked checkboxes script- by JavaScript Kit (www.javascriptkit.com)
* This notice must stay intact for usage
* Visit JavaScript Kit at http://www.javascriptkit.com/ for this script and 100s more
***********************************************/

			function checkboxlimit(checkgroup, limit){
  			var checkgroup=checkgroup
  			var limit=limit
  			for (var i=0; i<checkgroup.length; i++){
    			checkgroup[i].onclick=function(){
    			var checkedcount=0
    			for (var i=0; i<checkgroup.length; i++)
      			checkedcount+=(checkgroup[i].checked)? 1 : 0
    			if (checkedcount>limit){
      			alert("You can only select a maximum of "+limit+" 			checkboxes")
      			this.checked=false
      			}
    			}
  			}
}			

			//////end checkbox limit


		</script>
	</head>

		<body>
			<div id="wrapper">
		<div id ="mainbody">
		<?php 
			$colours = array("white","green","orange","red","blue","brown","skyblue","gray","mauve","indigo","purple", "silver", "sand colour", "light red", "black", "yellow", "rose pink", "scarlet");
			$hex = array("#FFFFFF","#00FF00","#FFA500","#FF0000","#0000FF","#A52A2A","#87CEEB","#808080","#CC99FF","#2E0854","#800080","#C0C0C0","#C2B280","#FF4D4D","#000000","#FFFF00","#FF66CC","#FF2400");
			$feelings = array("RUGGED", "ENERGETIC", "RADIENT", "WARM", "JOYOUS", "DEEP", "HAPPY", "BRILLIANT", "ALERT", "RURAL", "MERRY", "SIMPLE", "NAIVE", "FRANK", "FLAT", "ORDINARY", "SERIOUS", "BRUTAL", "SINISTER", "SAVAGE", "SAD", "ADGITATED", "RUSTIC", "OUTDOOR", "NOBLE", "ELEGENT", "GRACEFUL", "VIGOROUS", "BRAVE", "GENTLE", "CARESSING", "SELF-IMPORTANT", "CHARMING", "EVEN-TEMPERED", "CALM", "CONCENTRATED", "SORROW", "SHY", "GLOOMY", "DRAMATIC", "VIOLENT", "HUMOURLESS", "UNFRIENDLY", "FUNEREAL", "MYSTERIOUS", "PROFOUND", "DOLEFUL", "ANXIOUS", "SILLY", "PEACEFUL", "NOTHING", "ESCAPE", "LONGING", "HEAVY", "MELODRAMATIC", "REJOICE");
			

			$len = count($colours);
			$len_feel = count($feelings);
			$feeling_1 = $feeling_2 = $feeling_3 = $additional_1 = $additional_2 = $additional_3 = $comm_ent = $colour_0 = $colour_1 = $colour_2 = $colour_3 = $colour_4 = $colour_5 = $colour_6 = "";
			////////////////////this is where the music goes////////////
			if(isset($_GET["id"])) {
 				$song_id = $_GET["id"];
 				//echo 'song id is '.$song_id.'';
 				//echo '<br>';
 			}else{
 				
 				$song_id = '0';
 				//echo 'song id is '.$song_id.'';
 				//echo '<br>';
 			}
			////////////////////end of music////////////////////////////

 			////////////////////handling post data sent///////////////
 			/////textbox data///
 			if((isset($_POST["feel_ings_1"])) || (isset($_POST["feel_ings_2"])) || (isset($_POST["feel_ings_3"]))){
 					$feeling_1 = $_POST["feel_ings_1"];
 					$feeling_2 = $_POST["feel_ings_2"];
 					$feeling_3 = $_POST["feel_ings_3"];
 					//echo $feeling_1;
 					//echo '<br>';
 					//echo $feeling_2;
 					//echo '<br>';
 					//echo $feeling_3;
 					//echo '<br>';
 				}
 			///////end of textbox data//////////
 			////////begin checkbox data/////////
 			
 			if(isset($_POST["colour"])){
 				$len_colours = count($_POST["colour"]);
 				$colour = $_POST["colour"];

 				for($i = 0; $i <= count($colour) -1; $i++){
 					${'colour_' . $i} = $colour[$i];
 				}

 				//print_r($colour);
 				//echo '<br>';	
 			};

 			////////end checkbox data//////////
 			//////////begin feeling checkbox data/////////////

 			if(isset($_POST["feeling"])){
 				$len_feeling = count($_POST["feeling"]);
 				$feeling = $_POST["feeling"];

 				for($i = 0; $i <= count($feeling) -1; $i++){
 					${'feeling_' . $i} = $feeling[$i];
 				}

 				//print_r($feeling);
 				//echo '<br>';	
 			};

 			//////////end feeling checkbox data/////////////
 			if((isset($_POST["additional_colour_1"])) || (isset($_POST["additional_colour_2"])) || (isset($_POST["additional_colour_3"]))){
 					$additional_1 = $_POST["additional_colour_1"];
 					$additional_2 = $_POST["additional_colour_2"];
 					$additional_3 = $_POST["additional_colour_2"];
 					//echo $additional_1;
 					//echo $additional_2;
 					//echo $additional_3;
 				};

 			if(isset($_POST["comments"])){
 				$len_comments = count($_POST["comments"]);
 				$comm_ent = $_POST["comments"];
 				//echo $_POST["comments"];
				//echo '<br>';
 			};

 			$query = mysqli_query($mysqli,"SELECT ID FROM survey_2");
 			$id_count=array();
 			while($result = mysqli_fetch_assoc($query)){
 				array_push($id_count, $result['ID']);
 			}
 			
 			$column = count($id_count);
 			//////////add to database///////////
           /*
 			if($song_id > 0){

 				$sql = "INSERT INTO survey_2 (ID, Song_key, Colour1, Colour2, Colour3,Colour4,Colour5,Colour6,Feeling1,Feeling2,Feeling3) VALUES ('$column','$song_id','$colour_0','$colour_1', '$colour_2', '$additional_1', '$additional_2', '$additional_3', '$feeling_0', '$feeling_1', '$feeling_2')";
 				////sql code///
 			
 				if ($mysqli->query($sql) == TRUE) {
    				//echo "New record created successfully";
				} else {
    				echo "Error: " . $sql . "<br>" . $mysqli->error;
					}
 				}
 			*/
 			//////////finish adding to database//////

 			$song_no = $song_id +1;
 			if($song_no == 16){
 				echo '<center><h1>THANK YOU FOR COMPLETING THE SURVEY, PLEASE CLOSE THIS WINDOW </h1> </center>';
 			}
 			////////////////////end of post data///////////////////////
 			echo '<div id="header"><div id = "heading"> <p>SURVEY (Song '.$song_no.')</p></div><div id "music_section">
 				<audio controls loop autoplay>
 					<source src="'.$song_id.'.mp3" type="audio/mpeg">
					Your browser does not support the audio element.
				</audio>
 			</div></div>';
 			///////////////music section/////////////
 			echo '
 			';
 			
 			//////////////end music section////////////
 			echo '<div id ="colour_section">';
			echo '<p id = "title">What colour do you see while listening to this piece of music? (MAXIMUM 6 including additional) </p>';
			$next_song = $song_id +1;
			/////////////////begin form //////////////
			echo '<form action="survey.php?id='.$next_song.'" method ="post" id="myform" name="myform">';
			echo '<table id="color_table" border="1" >';
			echo '<tr>';
			

			for($i = 0; $i <= $len /2 -1; $i++){
				
				echo '<td bgcolor="'.$hex[$i].'" >' .$colours[$i]. 

				'</br>

				
				<input class="check_box" type="checkbox" name="colour[]" value="'.$colours[$i].'">
				</td>';
				
				
			};
			echo '</tr>';
			for($i = intval(($len /2)); $i <= $len - 1; $i++){
				echo '<td bgcolor="'.$hex[$i].'" >' .$colours[$i]. 

				'</br>

				<input class="check_box" type="checkbox" name="colour[]" value="'.$colours[$i].'">
				</td>';
			};
			echo '</tr>';
			echo '</table>';
			//===================end of table for colours==============
			echo '<p id ="title">(Optional) Additional Colour: Click on box to select colour</p> <br>
			<center>
			Colour 1: <input type="color" class="colorbox" name="additional_colour_1">
			&nbsp;&nbsp;&nbsp;&nbsp;
			';

			echo 'Colour 2: <input type="color" class="colorbox" name="additional_colour_2">
			&nbsp;&nbsp;&nbsp;&nbsp;';
			echo ' Colour 3: <input type="color" class="colorbox" name="additional_colour_3">
			&nbsp;&nbsp;&nbsp;&nbsp;';
			echo '</center>';
			echo '</div>';
			echo '</div>';
			echo '<div id ="feeling_section">';
			echo '<p id = "title">What do you feel when listening to this piece of music ?</p>';
			echo '</br>';
			//beginning of feeling choice table
			echo '<table id= "feel_table" border ="1">';
			echo '<tr>';
			for($i = 0; $i <= 9; $i++){
				echo'<td> '.$feelings[$i].' <br><input class="check_box" type="checkbox" name="feeling[]" value="'.$feelings[$i].'"></td>';
			};
			echo '</tr>';
			echo '<tr>';
			for($i = 10; $i <= 19; $i++){
				echo'<td> '.$feelings[$i].' <br><input class="check_box" type="checkbox" name="feeling[]" value="'.$feelings[$i].'"></td>';
			};
			echo '</tr>';
			echo '<tr>';
			for($i = 20; $i <= 29; $i++){
				echo'<td> '.$feelings[$i].' <br><input class="check_box" type="checkbox" name="feeling[]" value="'.$feelings[$i].'"></td>';
			};
			echo '</tr>';
			echo '<tr>';
			for($i = 30; $i <= 39; $i++){
				echo'<td> '.$feelings[$i].' <br><input class="check_box" type="checkbox" name="feeling[]" value="'.$feelings[$i].'"></td>';
			};
			echo '</tr>';
			echo '<tr>';
			for($i = 40; $i <= 49; $i++){
				echo'<td> '.$feelings[$i].' <br><input class="check_box" type="checkbox" name="feeling[]" value="'.$feelings[$i].'"></td>';
			};
			echo '</tr>';
			echo '<tr>';
			for($i = 50; $i <= count($feelings)  -1 ; $i++){
				echo'<td> '.$feelings[$i].' <br><input class="check_box" type="checkbox" name="feeling[]" value="'.$feelings[$i].'"></td>';
			};
			echo '</tr>';
			echo '</table>';
			//end feeling table
			/*
			echo '</br>';
			echo '<p id ="title"> Additional Comments (optional)</p>';
			echo '</br>';
			echo '<textarea rows="10" cols="97" class = "textarea"name="comments" id="comments"></textarea>'; */
			echo '</div>';
			echo '<div id = "button">';
			$next = 'Next song';
			$max = 14;
			if($song_id < $max){
				$next = $next;
			}else{
				$next = 'Finish';
			};
			echo '<input type="submit" value="'.$next.'" class="submitButton">';
			echo '</form>';

			echo '<script type="text/javascript">

					//Syntax: checkboxlimit(checkbox_reference, limit)
						checkboxlimit(document.forms.myform["colour[]"], 3)
						checkboxlimit(document.forms.myform["feeling[]"], 3)
			</script>';


			////////////////////end form///////////////////
			/*
			echo '<div id ="masterdiv">
  					<div class ="menutitle" onclick = "SwitchMenu(\'sub1\')"><center><p id ="showfeelings">Add Comments</p></center></div>
    				<span class ="submenu" id="sub1">';
        			echo '<center><div id ="feeling_box">';
    				//content
				echo '</center>';
				echo '</div>';	
        		echo '</div>';
    		echo'</span>'; 
			*/
    		echo'</div>';
			echo '</table>';
			echo '</div>';
			//end of feelings table=====================================
			echo '</br>';
			echo '</br>';
		 	/*
		 	if( $song_id > $max){
		 		header('Refresh: 0.1; url=finish.html');
		 	}
		 	*/
		 ?>

		</div>
	</div>
	</body>
	 <?php
mysqli_close($mysqli);
?>
</html>
