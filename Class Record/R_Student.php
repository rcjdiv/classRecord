<html>
	<head>
		<title> REMOVE STUDENT </title>
	</head>
	<center>
	<body>
		<img src="facebook-logo.jpg" alt="gwapodiez" width="1000" height="500">
		<h1>REMOVE STUDENT</h1>
		<form method = "GET">
			CLASS NAME: <input type = "text" name = "class"/> <br><br>
			ID NUM: <input type = "text" name = "ID"/><br><br>
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

	if(isset($_GET["class"]) && isset($_GET["ID"]))
	{
		$CLASS = $_GET["class"];
		$ID = $_GET["ID"];

		$sql = "DELETE FROM class_record.`$CLASS`
		WHERE ID = '$ID'";

		if($conn->query($sql) === TRUE)
		{
			echo "student deleted successfully from $CLASS";

		mysqli_close($conn);
		}
		else{
			echo "student not found from database";
		}
	}