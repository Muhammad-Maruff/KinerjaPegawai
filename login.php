<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>LOGIN | USER</title>
    <link rel="stylesheet" href="style.css">
</head>
<nav class="navbar">
  <a class="navbar-brand" href="#">
    <img src="https://www.patinews.com/wp-content/uploads/2015/03/logo-pln-pati.jpg" width="30" height="30" class="d-inline-block align-top foto" alt="" >
    <p class="judul">Sistem Manajemen Kinerja Pegawai (SIMKP)</p> 
  </a>
</nav>   
<body>
<!-- Image and text -->
<div class="Main">
    <h1>
        <img src="image/LOGO_PLN.png" alt="" class="logo">
    </h1>
        <div class="box-login">
            <h2 class="jd-admin">LOGIN</h2>
            <form action="cek_login.php" method="POST">
                <section id="label">
                <label for="">USERNAME</label>
                <input type="text" name="username" placeholder="Username..." class="input-control" id="input-user">
                </section>
                <label for="">PASSWORD</label>
                <input type="password" name="password" placeholder="Password..." class="input-control" id="input-pass">
                <input type="submit" name="submit" value="Login" class="btn-login">
            </form>
            </div>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</html>