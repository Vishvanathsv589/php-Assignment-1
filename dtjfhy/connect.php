<?php
	$name = $_POST['name'];
	$rollno = $_POST['rollno'];
	$gender = $_POST['gender'];
	$email = $_POST['email'];
	$department = $_POST['department'];
	$number = $_POST['number'];

	// Database connection
	$conn = new mysqli('localhost','root','','test_5890');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(name, rollno, gender, email, department, number) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssi", $name, $rollno, $gender, $email, $department, $number);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>