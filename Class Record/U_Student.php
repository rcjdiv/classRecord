<html>
	<head>
		<title> UPDATE STUDENT </title>
	</head>
	<center>
	<body>
		<img src="facebook-logo.jpg" alt="gwapodiez" width="1000" height="500">
		<h1>UPDATE STUDENT</h1>
		<form method = "GET">
			CLASS NAME: <input type = "text" name = "class"/> <br><br>
			ID NUM: <input type = "text" name = "ID"/><br><br>
			SEATWORK: <input type = "text" name = "seatwork"/><br><br>
			PROJECTS: <input type = "text" name = "projects"/><br><br>
			PREMID: <input type = "text" name = "premid"/><br><br>
			MIDTERM: <input type = "text" name = "midterm"/><br><br>
			PREFI: <input type = "text" name = "prefi"/><br><br>
			FINALS: <input type = "text" name = "finals"/><br><br>
			<input type = "submit"/>
		</form>

		<form method = "GET" action = "TEACHER.php">
			<input type = "submit" value = "BACK TO HOME">
		</form>	

<?php

	$conn = new mysqli("localhost", "root", "", "class_record");
	// Check connection

			$table = "SHOW TABLES FROM class_record";
			$result = mysqli_query($conn,"SHOW TABLES");

			echo "<br>";
			echo "<br>";
			echo "<br>";
			echo "CLASSES TO CHOOSE:";
			echo "<br>";
			while($table = mysqli_fetch_row($result))
			{
				echo "<br>";
				echo "$table[0]". "<br>". "<br>";
			}


	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 


	if(isset($_GET["class"]) or isset($_GET["projects"]) or isset($_GET["seatwork"]) or isset($_GET["ID"]) or isset($_GET["premid"])  or isset($_GET["midterm"])  or isset($_GET["prefi"])  or isset($_GET["finals"]))
	{
		$CLASS = $_GET["class"];
		$ID = $_GET["ID"];
		$PREMID = $_GET["premid"];
		$MIDTERM = $_GET["midterm"];
		$PREFI = $_GET["prefi"];
		$FINALS = $_GET["finals"];
		$SEATWORK = $_GET["seatwork"];
		$PROJECTS = $_GET["projects"];

		$SUMMATIVE = ($PREMID + $MIDTERM + $PREFI + $FINALS) / 4;
		$FORMATIVE = ($SEATWORK+$PROJECTS)/2;
		$FG = ($SUMMATIVE*0.9) + ($FORMATIVE*0.1);

		$sql = "UPDATE class_record.`$CLASS` SET formative='$FORMATIVE', summative='$SUMMATIVE', FG='$FG', premid='$PREMID', midterm='$MIDTERM', prefi='$PREFI', finals='$FINALS', seatwork='$SEATWORK', projects='$PROJECTS'			
		WHERE ID='$ID'";

		if($conn->query($sql) === TRUE)
		{
			echo "student updated successfully in $CLASS";
		}
		else{
			echo "ERROR";
		}
	}
	

