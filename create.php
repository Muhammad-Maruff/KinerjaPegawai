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
              <a class="nav-link" aria-current="page" href="superadmin.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="juknis.php">Juknis</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="user.php">User</a>
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
        <form>
  <div class="row mb-3">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Nama</label>
    <div class="col-sm-10">
      <input type="text" class="form-control">
    </div>
  </div>
  <div class="row mb-3">
    <label for="" class="col-sm-2 col-form-label">Alamat</label>
    <div class="col-sm-10">
      <input type="text" class="form-control">
    </div>
  </div>
  <div class="row mb-3">
    <label for="" class="col-sm-2 col-form-label">Divisi</label>
    <div class="col-sm-10">
      <input type="text" class="form-control">
    </div>
  </div>
  <div class="row mb-3">
    <div class="col-sm-10 offset-sm-2">

    </div>
  </div>
</form>
<!--Akhir input data-->
        
        </div>
        <div class="card-footer">

        </div>
      </div>
      </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>