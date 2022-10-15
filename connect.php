<?php
    $nama = $_POST['nama'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	// Database connection
	$conn = new mysqli('localhost','root','','kinerjapegawai');
	if($nama == null){
		echo '<script>alert("Lengkapi nama terlebih dahulu!")</script>';
        echo '<script>window.location="user.php"</script>';
	} 
    else if($username == null){
		echo '<script>alert("Lengkapi username terlebih dahulu!")</script>';
        echo '<script>window.location="user.php"</script>';
	} 
    else if($password == null){
		echo '<script>alert("Lengkapi password Terlebih Dahulu !")</script>';
        echo '<script>window.location="user.php"</script>';
	} 
    else {
		$stmt = $conn->prepare("insert into tb_user(nama,username,password) values(?, ?, ?)");
		$stmt->bind_param("sss", $nama,$username,$password);
		$execval = $stmt->execute();
		echo $execval;
		echo '<script>alert("Registration successfully...")</script>';
        echo '<script>window.location="user.php"</script>';
		$stmt->close();
		$conn->close();
	}
?>