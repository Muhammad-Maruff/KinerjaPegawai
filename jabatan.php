<?php 

//index.php


$connect = new PDO("mysql:host=localhost; dbname=kinerjapegawai", "root", "");

$query = "
SELECT divisi FROM tb_divisi 
ORDER BY divisi ASC
";

$result = $connect->query($query);


$data = array();

foreach($result as $row)
{
    $data[] = array(
        'label'     =>  $row['divisi'],
        'value'     =>  $row['divisi']
    );
}
?>

<?php
  //Koneksi database
  $server = "localhost";
  $user = "root";
  $password = "";
  $database = "kinerjapegawai";

  //buat koneksi
  $koneksi = mysqli_connect($server, $user, $password, $database) or die(mysqli_error($koneksi));


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Form | DATA</title>
    <link rel="stylesheet" href="style2.css">
</head>

<?php 
	session_start();
 
	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['level']==""){
		header("location:login.php?pesan=gagal");
	}
 
	?>

<body>
      <!-- Nav -->
      <nav class="navbar navbar-expand-lg navbar-dark bg-info shadow-sm">
      <div class="container">
        <a href=""> <img src="https://www.patinews.com/wp-content/uploads/2015/03/logo-pln-pati.jpg" width="30" height="30" class="d-inline-block align-top logo" alt="" ></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link" href="superadmin.php">Juknis</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="nav-user.php">User</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="jabatan.php">Jabatan</a>
            </li>
             <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"> 
      <?php 
        echo $_SESSION['username'];
        ?>
        </a>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item" href="keluar.php">Keluar</a></li>
    </ul>
  </li>
          </ul>
        </div>
      </div>
    </nav>

    <!--Card-->
    <div class="row">
      <div class="col-md-8 mx-auto newdata">
      <div class="card">
        <div class="card-header new-data">
          Form User Account
        </div>
        <div class="card-body">
        <!--Input Data-->
        <form action="connect-jabatan.php" method="post">

        <div class="row mb-3">
    <label for="nama" class="col-sm-2 col-form-label nama" name="nama">Jabatan</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="divisi" id="divisi">
    </div>
  </div>

  <div class="text-center">
  <input type="submit" class="btn btn-primary btn-register">
</form>
  </div>
 
<!--Akhir input data-->
        
        </div>

        <table class="table table-striped table:hover table-bordered">
            <tr>
              <th>ID</th>
              <th>Jabatan</th>

            </tr>
            <?php
              //persiapan menampilkan data
            $user = mysqli_query($koneksi, "SELECT * FROM tb_divisi order by id asc");
            while($account = mysqli_fetch_array($user)) :
            ?>

            <tr>
              <td><?= $account['id'] ?></td>
              <td><?= $account['divisi'] ?></td>
            </tr>
            <?php endwhile; ?>


      </table>
      
        <div class="card-footer">

        </div>
      </div>
      </div>
    </div>


    <script>
var auto_complete = new Autocomplete(document.getElementById('divisi'), {
    data:<?php echo json_encode($data); ?>,
    maximumItems:10,
    highlightTyped:true,
    highlightClass : 'fw-bold text-primary'
}); 
</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="/library/autocomplete.js"></script>
</body>
</html>
</body>
</html>