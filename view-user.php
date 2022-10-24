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

  //jika button simpan diklik
  if(isset($_POST['btn-simpan'])){
    //Data akan disimpan
    $simpan = mysqli_query($koneksi, "INSERT INTO tb_data (deskripsi,definisi,tujuan,satuan,kategori_satuan,formula,sumber_target,tipe_kpi,tipe_target,frekuensi,polaritas,divisi,pemilik,eviden,syarat_ketentuan,kpi_parent)
                                      VALUE ( '$_POST[tdeskripsi]', 
                                              '$_POST[tdefinisi]',
                                              '$_POST[ttujuan]', 
                                              '$_POST[tsatuan]', 
                                              '$_POST[tkategori]', 
                                              '$_POST[tformula]', 
                                              '$_POST[tsumber]', 
                                              '$_POST[ttipe]',
                                              '$_POST[ttarget]', 
                                              '$_POST[tfrekuensi]', 
                                              '$_POST[tpolaritas]', 
                                              '$_POST[tdivisi]', 
                                              '$_POST[tpemilik]', 
                                              '$_POST[teviden]', 
                                              '$_POST[tsyarat]', 
                                              '$_POST[tparent]')
                                  ");
    
    //uji jika simpan data sukses
    if($simpan){
      echo "<script>
      alert('data berhasil disimpan!');
      document.location='superadmin.php';
      </script>";
    } else{
      echo "<script>
        alert('Simpan data gagal');
        document.location='superadmin.php'
      </script>";
    }
    $tampil = mysqli_query($koneksi, "SELECT * FROM tb_data order by id_data asc");
            while($data = mysqli_fetch_array($tampil));
  }

  //deklarasi variabel untuk menampung data yang akan diedit
  $vid = "";
  $vdeskripsi = "";
  $vdefinisi = "";
  $vtujuan = "";
  $vsatuan = "";
  $vkategori_satuan = "";
  $vformula = "";
  $vsumber_target = "";
  $vtipe_kpi = "";
  $vtipe_target="";
  $vfrekuensi = "";
  $vpolaritas ="";
  $vdivisi = "";
  $vpemilik = "";
  $veviden = "";
  $vsyarat_ketentuan = "";
  $vkpi_parent = "";



  //jika tombol edit diedit/hapus
  if(isset($_GET['hal'])){
    //jika edit data
    if($_GET['hal'] == "view"){
      //tampilkan data yang akan diedit

      
      $tampil=mysqli_query($koneksi, "SELECT * FROM tb_data WHERE id_data = '$_GET[id]'");
    
      $data = mysqli_fetch_array($tampil);
      if($data){
        //jika data ditemukan, maka data ditampung kedalam variabel
        $vid = $data['id_data'];
        $vdeskripsi = $data['deskripsi'];
        $vdefinisi = $data['definisi'];
        $vtujuan = $data['tujuan'];
        $vsatuan = $data['satuan'];
        $vkategori_satuan = $data['kategori_satuan'];
        $vformula = $data['formula'];
        $vsumber_target = $data['sumber_target'];
        $vtipe_kpi = $data['tipe_kpi'];
        $vtipe_target = $data['tipe_target'];
        $vfrekuensi = $data['frekuensi'];
        $vpolaritas = $data['polaritas'];
        $vdivisi = $data['divisi'];
        $vpemilik = $data['pemilik'];
        $veviden = $data['eviden'];
        $vsyarat_ketentuan = $data['syarat_ketentuan'];
        $vkpi_parent = $data['kpi_parent'];
      }
    }
  }

  
?>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="library/bootstrap-5/bootstrap.min.css" rel="stylesheet" />
        <script src="library/bootstrap-5/bootstrap.bundle.min.js"></script>
        <script src="library/autocomplete.js"></script>
        <link rel="stylesheet" href="style2.css">

        <title>Typeahead Autocomplete using JavaScript in PHP for Bootstrap 5</title>
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
      session_start();
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
    <table class="table table-striped table:hover table-bordered">
            <tr>
              <th align="left">Deskripsi</th>
              <td><?= $data['deskripsi'] ?></td>
            </tr>

            <tr>
              <th align="left">Definisi</th>
              <td><?= $data['definisi'] ?></td>
            </tr>

            <tr>
              <th align="left">Tujuan</th>
              <td><?= $data['tujuan'] ?></td>
            </tr>

            <tr>
              <th align="left">Satuan</th>
              <td><?= $data['satuan'] ?></td>
            </tr>

            <tr>
              <th align="left">Kategori Satuan</th>
              <td><?= $data['kategori_satuan'] ?></td>
            </tr>

            <tr>
              <th align="left">Formula</th>
              <td><?= $data['formula'] ?></td>
            </tr>

            <tr>
              <th align="left">Sumber Target</th>
              <td><?= $data['sumber_target'] ?></td>
            </tr>

            <tr>
              <th align="left">Tipe KPI</th>
              <td><?= $data['tipe_kpi'] ?></td>
            </tr>

            <tr>
              <th align="left">Tipe Target</th>
              <td><?= $data['tipe_target'] ?></td>
            </tr>

            <tr>
              <th align="left">Frekuensi</th>
              <td><?= $data['frekuensi'] ?></td>
            </tr>

            <tr>
              <th align="left">Polaritas</th>
              <td><?= $data['polaritas'] ?></td>
            </tr>

            <tr>
              <th align="left">Divisi</th>
              <td><?= $data['divisi'] ?></td>
            </tr>

            <tr>
              <th align="left">Pemilik</th>
              <td><?= $data['pemilik'] ?></td>
            </tr>

            <tr>
              <th align="left">Eviden</th>
              <td><?= $data['eviden'] ?></td>
            </tr>

            <tr>
              <th align="left">Syarat & Ketentuan</th>
              <td><?= $data['syarat_ketentuan'] ?></td>
            </tr>

            <tr>
              <th align="left">KPI Parent</th>
              <td><?= $data['kpi_parent'] ?></td>
            </tr>



            <?php
            
              //persiapan menampilkan data
              $no = 1;
            $tampil = mysqli_query($koneksi, "SELECT * FROM tb_data order by id_data asc");
            while($data = mysqli_fetch_array($tampil)) :
            ?>
            <?php endwhile; ?>

            </table>
       
     <!--Akhir input data-->
     
    

        <script>
var auto_complete = new Autocomplete(document.getElementById('divisi'), {
    data:<?php echo json_encode($data); ?>,
    maximumItems:10,
    highlightTyped:true,
    highlightClass : 'fw-bold text-primary'
}); 

</script>
<script src="/library/autocomplete.js"></script>
    </body>
</html>

