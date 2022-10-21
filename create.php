<?php 

//index.php


$connect = new PDO("mysql:host=localhost; dbname=kinerjapegawai", "root", "");

$query = "
SELECT divisi FROM tb_divisi 
ORDER BY divisi ASC
";

$queri = "
SELECT pemilik FROM tb_pemilik
ORDER BY pemilik ASC
";

$result = $connect->query($query);
$resultt = $connect->query($queri);

$data = array();

foreach($result as $row)
{
    $data[] = array(
        'label'     =>  $row['divisi'],
        'value'     =>  $row['divisi']
    );
}

foreach($resultt as $row)
{
    $data[] = array(
        'label'     =>  $row['pemilik'],
        'value'     =>  $row['pemilik']
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
    <nav class="navbar navbar-expand-lg navbar-dark bg-info shadow-sm">
      <div class="container">
        <a href=""> <img src="https://www.patinews.com/wp-content/uploads/2015/03/logo-pln-pati.jpg" width="30" height="30" class="d-inline-block align-top logo" alt="" ></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="superadmin.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="juknis.php">Juknis</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="nav-user.php">User</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="role.php">Role Permission</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="keluar.php">Keluar</a>
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
    <label for="inputEmail3" class="col-sm-2 col-form-label">Deskripsi KPI</label>
    <div class="col-sm-10">
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="tdeskripsi"></textarea>
    </div>
  </div>
  <div class="row mb-3">
    <label for="" class="col-sm-2 col-form-label">Definisi KPI</label>
    <div class="col-sm-10">
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="tdefinisi"></textarea>
    </div>
  </div>
          

        <div class="row mb-3">
    <label for="" class="col-sm-2 col-form-label">Tujuan KPI</label>
    <div class="col-sm-10">
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="ttujuan"></textarea>
    </div>
  </div>

  <div class="row mb-3">
    <label for="" class="col-sm-2 col-form-label">Satuan</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="tsatuan">
    </div>
  </div>

  <div class="row mb-3">
    <label for="" class="col-sm-2 col-form-label">Kategori Satuan</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="tkategori">
    </div>
  </div>

  <div class="row mb-3">
    <label for="" class="col-sm-2 col-form-label">Formula</label>
    <div class="col-sm-10">
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="tformula"></textarea>
    </div>
  </div>

  <div class="row mb-3">
    <label for="" class="col-sm-2 col-form-label">Sumber Target</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="tsumber">
    </div>
  </div>

  <div class="row mb-3">
    <label for="" class="col-sm-2 col-form-label">Tipe KPI</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="ttipe">
    </div>
  </div>

  <div class="row mb-3">
    <label for="" class="col-sm-2 col-form-label">Tipe Target</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="ttarget">
    </div>
  </div>

  <div class="row mb-3">
    <label for="" class="col-sm-2 col-form-label">Frekuensi</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="tfrekuensi">
    </div>
  </div>

  <div class="row mb-3">
    <label for="" class="col-sm-2 col-form-label">Polaritas</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="tpolaritas">
    </div>
  </div>

  <div class="row mb-3">
      <label for="" class="col-sm-2 col-form-label">Jabatan Pemilik KPI</label>
      <div class="col-sm-10">
          <input type="text" name="tdivisi" id="divisi" class="form-control"/>
      </div>
  </div>
  <div class="row mb-3">
    <label for="" class="col-sm-2 col-form-label">Pemilik KPI</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="tpemilik" id="pemilik">
    </div>
  </div>

  <div class="row mb-3">
    <label for="" class="col-sm-2 col-form-label">Eviden</label>
    <div class="col-sm-10">
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="teviden"></textarea>
    </div>
  </div>

  <div class="row mb-3">
    <label for="" class="col-sm-2 col-form-label">Syarat & Ketentuan</label>
    <div class="col-sm-10">
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="tsyarat"></textarea>
    </div>
  </div>

  <div class="row mb-3">
    <label for="" class="col-sm-2 col-form-label">KPI Parent</label>
    <div class="col-sm-10">
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="tparent"></textarea>
    </div>
  </div>
  <div class="text-center">
      <hr>
      <button class="btn btn-primary btn-simpan" name="btn-simpan" type="submit">Save</button>
      <button class="btn btn-primary btn-clear" name="btn-clear" type="reset">Clear</button>
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

var auto_pemilik = new Autocomplete(document.getElementById('pemilik'), {
    data:<?php echo json_encode($data); ?>,
    maximumItems:10,
    highlightTyped:true,
    highlightClass : 'fw-bold text-primary'
}); 

</script>
<script src="/library/autocomplete.js"></script>
    </body>
</html>

