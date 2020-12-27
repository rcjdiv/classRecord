<html>
	<head>
		<title> DISPLAY CLASS </title>
	</head>
	<center>
	<body>
		<img src="facebook-logo.jpg" alt="gwapodiez" width="1000" height="500">
		<h1>DISPLAY CLASS RECORD</h1>

		<form method = "GET" action = "TEACHER.php">
			<input type = "submit" value = "BACK TO HOME">
		</form>

<?php

	$conn = new mysqli("localhost", "root", "", "class_record");
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 

		$table = "SHOW TABLES FROM class_record";
		$result = mysqli_query($conn,"SHOW TABLES");
			while($table = mysqli_fetch_row($result))
			{
				echo "$table[0]". "<br>". "<br>";
			}

		mysqli_close($conn);
	?>