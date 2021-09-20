<?php
	$Name = $_POST['fname'];
	
	
	
	$rollnumber = $_POST['rollno'];

    $email = $_POST['email'];
	$document = $_POST['pdfs'];

	// Database connection
	$conn = new mysqli('localhost','root','','asiigninfo');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into assigninfo(username,rollnumber,email,document) values(?, ?, ?, ?)");
		$stmt->bind_param("sisb",$Name, $rollnumber,$email, $document);
		$execval = $stmt->execute();
		echo $execval;
		echo "Inserted successfully...";
		$stmt->close();
		$conn->close();
	}
?>