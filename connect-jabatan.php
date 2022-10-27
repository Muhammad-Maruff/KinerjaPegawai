<?php
    $divisi = $_POST['divisi'];
	
	// Database connection
	$conn = new mysqli('localhost','root','','kinerjapegawai');
	if($divisi == null){
		echo '<script>alert("Lengkapi jabatan terlebih dahulu!")</script>';
        echo '<script>window.location="jabatan.php"</script>';
	} 
    else {
		$stmt = $conn->prepare("insert into tb_divisi(divisi) values(?)");
		$stmt->bind_param("s", $divisi);
		$execval = $stmt->execute();
		echo $execval;
		echo '<script>alert("Add Jabatan Successfully...!")</script>';
        echo '<script>window.location="jabatan.php"</script>';
		$stmt->close();
		$conn->close();
	}
?>