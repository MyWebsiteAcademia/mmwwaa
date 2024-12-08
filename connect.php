<?php
	$password = $_POST['password'];
	$text = $_POST['text'];
	$email = $_POST['email'];

	$conn = new mysqli('localhost','root','','mwa');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into sign up(email, password, text) values(?, ?, ?)");
		$stmt->bind_param("ssi", $email, $password, $text);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>