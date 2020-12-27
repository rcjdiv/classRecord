<html>
	<head>
		<title> DISPLAY STUDENTS </title>
	</head>
	<center>
	<body>
		<img src="facebook-logo.jpg" alt="gwapodiez" width="1000" height="500">
		<h1>DISPLAY STUDENTS</h1>
		<form method = "GET">
			CLASS NAME: <input type = "text" name = "class"/>
			<input type = "submit"/>
		</form>
		<form method = "GET" action = "TEACHER.php">
			<input type = "submit" value = "BACK TO HOME">
		</form>

<table>
		<tr>
			<th>ID PICTURE: </th>
			<th>--ID: </th>
			<th>--NAME: </th>
			<th>--PREMID: </th>
			<th>--MIDTERM: </th>
			<th>--PREFI: </th>
			<th>--FINALS: </th>
			<th>--SEATWORK: </th>
			<th>--PROJECT: </th>
			<th>--SUMMATIVE: </th>
			<th>--FORMATIVE: </th>
			<th>--FINAL GRADE: </th>
		</tr>

<?php

	$conn = new mysqli("localhost", "root", "", "class_record");
	// Check connection
	if ($conn->connect_error) {
		echo "<center>";
	    die("Connection failed: " . $conn->connect_error);
	} 

	if(isset($_GET["class"])){
		$CLASS = $_GET["class"];


		$sql = "SELECT Fname, Lname, Mname, ID, premid, midterm, prefi, finals, summative, formative, FG, seatwork,projects,img_location FROM class_record.`$CLASS`";
		$result = $conn->query($sql);
		if($result){
			if ($result->num_rows > 0)
			{
				while($row = $result->fetch_assoc()) {
					echo "<tr><td>" ."<img src='images/".$row["img_location"]."'height='100' widht='100'>". "</td><td>".$row["ID"]. "</td><td>" . $row["Fname"]. " " . $row["Mname"]. ". " .$row["Lname"].  
					"</td><td>" .$row["premid"]. "</td><td>" .$row["midterm"]. "</td><td>" .$row["prefi"]. "</td><td>" .$row["finals"]. "</td><td>" .$row["seatwork"]. "</td><td>" .$row["projects"].
					"</td><td>" .$row["summative"]. "</td><td>" .$row["formative"] ;
					if($row["FG"] > 3.0){
						echo '</td><td><div style="Color:red">'.$row["FG"]. "</td></tr>";
					}
					else{
						echo '</td><td><div style="Color:green">'.$row["FG"]. "</td></tr>";
					}
				}
				echo"</table>";
			}
		}
		else{
				echo "<center>";
				echo "0 RESULTS";
			}
			

		mysqli_close($conn);
	}
	?>
</table>