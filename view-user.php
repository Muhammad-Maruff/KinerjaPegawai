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
    <div class="row">
      <div class="col-md-8 mx-auto newdata">
      <div class="card">
        <div class="card-header new-data">
          Form Input Data
        </div>
        <div class="card-body">
        <!--Input Data-->
        <form method="POST">
        <div class="row mb-3">
    <label for="inputEmail3" class="col-sm-2 col-form-label">ID</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="tid" value="<?= $vid ?>" disabled>
    </div>
  </div>
  <div class="row mb-3">
  <label for="inputEmail3" class="col-sm-2 col-form-label">Deskripsi KPI</label>
    <div class="col-sm-10">
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="tdeskripsi"  disabled><?= $vdeskripsi ?></textarea>
    </div>
  </div>
  <div class="row mb-3">
    <label for="" class="col-sm-2 col-form-label">Definisi KPI</label>
    <div class="col-sm-10">
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="tdefinisi"  disabled><?= $vdefinisi ?></textarea>
    </div>
  </div>
          

        <div class="row mb-3">
    <label for="" class="col-sm-2 col-form-label">Tujuan KPI</label>
    <div class="col-sm-10">
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="ttujuan"  disabled><?= $vtujuan ?></textarea>
    </div>
  </div>

  <div class="row mb-3">
    <label for="" class="col-sm-2 col-form-label">Satuan</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="tsatuan" value="<?= $vsatuan ?>" disabled>
    </div>
  </div>

  <div class="row mb-3">
    <label for="" class="col-sm-2 col-form-label">Kategori Satuan</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="tkategori" value="<?= $vkategori_satuan ?>" disabled>
    </div>
  </div>

  <div class="row mb-3">
    <label for="" class="col-sm-2 col-form-label">Formula</label>
    <div class="col-sm-10">
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="tformula"  disabled><?= $vformula?></textarea>
    </div>
  </div>

  <div class="row mb-3">
    <label for="" class="col-sm-2 col-form-label">Sumber Target</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="tsumber" value="<?= $vsumber_target ?>" disabled>
    </div>
  </div>

  <div class="row mb-3">
    <label for="" class="col-sm-2 col-form-label">Tipe KPI</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="ttipe" value="<?= $vtipe_kpi ?>" disabled>
    </div>
  </div>

  <div class="row mb-3">
    <label for="" class="col-sm-2 col-form-label">Tipe Target</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="ttarget" value="<?= $vtipe_target ?>" disabled>
    </div>
  </div>

  <div class="row mb-3">
    <label for="" class="col-sm-2 col-form-label">Frekuensi</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="tfrekuensi" value="<?= $vfrekuensi ?>" disabled>
    </div>
  </div>

  <div class="row mb-3">
    <label for="" class="col-sm-2 col-form-label">Polaritas</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="tpolaritas" value="<?= $vpolaritas ?>" disabled>
    </div>
  </div>

  <div class="row mb-3">
      <label for="" class="col-sm-2 col-form-label">Jabatan Pemilik KPI</label>
      <div class="col-md-10">
          <input type="text" name="tdivisi" id="divisi" class="form-control" value="<?= $vdivisi ?>" disabled>
      </div>
  <br>
  </div>
  <div class="row mb-3">
    <label for="" class="col-sm-2 col-form-label">Pemilik KPI</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="tpemilik" value="<?= $vpemilik ?>" disabled>
    </div>
  </div>

  <div class="row mb-3">
    <label for="" class="col-sm-2 col-form-label">Eviden</label>
    <div class="col-sm-10">
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="teviden"  disabled><?= $veviden ?></textarea>
    </div>
  </div>

  <div class="row mb-3">
    <label for="" class="col-sm-2 col-form-label">Syarat & Ketentuan</label>
    <div class="col-sm-10">
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="tsyarat"  disabled><?= $vsyarat_ketentuan ?></textarea>
    </div>
  </div>

  <div class="row mb-3">
    <label for="" class="col-sm-2 col-form-label">KPI Parent</label>
    <div class="col-sm-10">
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="tparent"  disabled><?= $vkpi_parent ?></textarea>
    </div>
  </div>

</form>   
        </div>
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

