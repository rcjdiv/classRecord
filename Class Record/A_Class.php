<html>
	<head>
		<title> ADD CLASS </title>
	</head>
	<body>
	<center>
		<img src="facebook-logo.jpg" alt="gwapodiez" width="1000" height="500">
		<h1>ADD CLASS RECORD</h1>
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
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 

	if(isset($_GET["class"])){
		$class = $_GET["class"];
		$sql = "CREATE TABLE `$class` (
		ID BIGINT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		Lname VARCHAR(20) NOT NULL,
		Fname VARCHAR(20) NOT NULL,
		Mname VARCHAR(20) NOT NULL,
		premid FLOAT(5),
		midterm FLOAT(5),
		prefi FLOAT(5),
		finals FLOAT(5),
		seatwork FLOAT(5),
		projects FLOAT(5),
		summative FLOAT(5),
		formative FLOAT(5),
		FG FLOAT(5),
		img_location varchar(150) NOT NULL
		)";	
	
		if ($conn->query($sql) === TRUE) {
	    echo "Class $class successfully added";
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

		} 
		else {
	    echo "Error creating table: " . $conn->error;
		}

		$conn->close();
	}
	
	?>
	
</body>
</html>