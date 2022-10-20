<?php
  //Koneksi database
  $server = "localhost";
  $user = "root";
  $password = "";
  $database = "kinerjapegawai";

  //buat koneksi
  $koneksi = mysqli_connect($server, $user, $password, $database) or die(mysqli_error($koneksi));


?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DASHBOARD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
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
              <a class="nav-link" aria-current="page" href="user.php">Juknis</a>
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

    
    <h3 class="box">Selamat Datang, 
        <?php 
    echo $_SESSION['username'];
     ?>
        </h3>

 <!--Card-->
 <div class="card mt-3">
        <div class="card-header header-data">
          Data Karyawan
        </div>

        <div class="card-body">
          <div class="col-md-6 mx-auto">
            <form action="" method="POST">
              <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search...">
                <button class="btn btn-primary" type="submit" name="btn-cari">Cari</button>
                <button class="btn btn-danger" type="submit" name="btn-reset">Reset</button>
              </div>
            </form>
          </div>

          <table class="table table-striped table:hover table-bordered">
            <tr>
              <th>ID</th>
              <th>Deskripsi KPI</th>
              <th>Satuan KPI</th>
              <th>Kategori Satuan</th>
              <th>Tipe KPI</th>
              <th>Tipe Target</th>
              <th>Polaritas</th>
              <th>Jabatan Pemilik KPI</th>
              <th>Aksi</th>
            </tr>

            <?php
            
              //persiapan menampilkan data
              $no = 1;
            $tampil = mysqli_query($koneksi, "SELECT * FROM tb_data order by id_data asc");
            while($data = mysqli_fetch_array($tampil)) :
            ?>

            <tr>
              <td><?= $data['id_data'] ?></td>
              <td><?= $data['deskripsi'] ?></td>
              <td><?= $data['satuan'] ?></td>
              <td><?= $data['kategori_satuan'] ?></td>
              <td><?= $data['tipe_kpi'] ?></td>
              <td><?= $data['tipe_target'] ?></td>
              <td><?= $data['polaritas'] ?></td>
              <td><?= $data['divisi'] ?></td>
              <td>
                <a href="view-user.php?hal=view&id=<?=$data['id_data']?>" class="btn btn-view">View</a>
                
              </td>
            </tr>
            <?php endwhile; ?>

            </table>
        </div>
        <div class="card-footer footer-data">
      
        </div>
      </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>