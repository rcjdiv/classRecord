<html>
	<head>
		<title> REMOVE CLASS </title>
	</head>
	<center>
	<body>
		<img src="facebook-logo.jpg" alt="gwapodiez" width="1000" height="500">
		<h1>REMOVE CLASS RECORD</h1>
		<form method = "GET">
			Class Name: <input type = "text" name = "class"/>
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

	if(isset($_GET["class"])){
		$class = $_GET["class"];
		$sql = "DROP TABLE `$class`";
	
		if ($conn->query($sql) === TRUE) {
	    echo "Class $class successfully deleted";
		} 
		else {
	    echo "Error creating table: " . $conn->error;
		}

		$conn->close();
	}
	?>