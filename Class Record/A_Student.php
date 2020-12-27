<html>
	<head>
		<title> ADD STUDENT </title>
	</head>
	<center>
	<body>
		<img src="facebook-logo.jpg" alt="gwapodiez" width="1000" height="500">
		<h1>ADD STUDENT</h1>
		<form method = "POST" enctype ="multipart/form-data">
			CLASS NAME: <input type = "text" name = "class"/> <br><br>
			IMAGE: <input type = "file" name = "image"/><br><br>
			ID NUM: <input type = "text" name = "ID"/><br><br>
			LAST NAME: <input type = "text" name = "Lname"/><br><br>
			FIRST NAME: <input type = "text" name = "Fname"/><br><br>
			MIDDLE NAME: <input type = "text" name = "Mname"/><br><br>
			PREMID: <input type = "text" name = "premid"/><br><br>
			MIDTERM: <input type = "text" name = "midterm"/><br><br>
			PREFI: <input type = "text" name = "prefi"/><br><br>
			FINALS: <input type = "text" name = "finals"/><br><br>
			SEATWORK: <input type = "text" name = "seatwork"/><br><br>
			PROJECTS: <input type = "text" name = "projects"/><br><br>
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

	if(isset($_POST["class"])  &&	isset($_POST["projects"])  && isset($_POST["seatwork"]) && isset($_POST["Fname"]) && isset($_POST["Lname"]) && isset($_POST["ID"]) && isset($_POST["Mname"])  && isset($_POST["premid"])  && isset($_POST["midterm"])  && isset($_POST["prefi"])  && isset($_POST["finals"]))
	{

		$CLASS = $_POST["class"];
		$ID = $_POST["ID"];
		$FNAME = $_POST["Fname"];
		$LNAME = $_POST["Lname"];
		$MNAME = $_POST["Mname"];
		$PREMID = $_POST["premid"];
		$MIDTERM = $_POST["midterm"];
		$PREFI = $_POST["prefi"];
		$FINALS = $_POST["finals"];
		$SEATWORK = $_POST["seatwork"];
		$PROJECTS = $_POST["projects"];
		// $PROJECTS =$IMAGE = $_FILES["image"]; $_GET["projects"];
		

		$SUMMATIVE = ($PREMID + $MIDTERM + $PREFI + $FINALS) / 4;
		$FORMATIVE = ($SEATWORK + $PROJECTS)/2;
		$FG = ($SUMMATIVE*0.9) + ($FORMATIVE*0.1);


		$image = $_FILES['image']['name'];
		$target = "images/".basename($image);

	
		$sql = "INSERT INTO class_record.`$CLASS` (Fname, Lname, Mname, ID, premid, midterm, prefi, finals, summative, formative, FG, seatwork,projects,img_location)
		VALUES ('$FNAME','$LNAME','$MNAME','$ID', '$PREMID', '$MIDTERM', '$PREFI', '$FINALS', '$SUMMATIVE', '$FORMATIVE', '$FG', '$SEATWORK','$PROJECTS','$image')";

		if($conn->query($sql) === TRUE)
		{
			echo "<center>";
			echo "student added successfully in $CLASS";
			if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
				echo "<center>";
				echo "image added successfully";
			}
			else{
				echo "image not added successfully";
			}
		}
		else{
			echo "ERROR";
		}
	}