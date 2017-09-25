<?php
  $mysqli=mysqli_connect("ephesus.cs.cf.ac.uk", "c1327916", "dharanboi1995", "c1327916");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
?>

<?php 
	$sql = "INSERT INTO feelings (bpm, colour, total)
VALUES ('1', 'red', '20')";

if ($mysqli->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
}
?>
<?php
mysqli_close($mysqli);
?>