<?php
	$username = $_POST['username'];
	$password = $_POST['password'];
	$address = $_POST['address'];
	// Database connection
	$conn = new mysqli('localhost','root','','kinerjapegawai');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into tb_user(username,password,address) values(?, ?, ?)");
		$stmt->bind_param("sss", $username, $password, $address);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
        echo '<script>window.location="superadmin.php"</script>';
		$stmt->close();
		$conn->close();
	}
?>