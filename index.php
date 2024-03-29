<?php 

  session_start();

  if(!isset($_SESSION["login"])){

      header('location:login.php');
      exit;

  }

  require 'functions.php';
  $mahasiswa = query("SELECT * FROM mahasiswa");

   if(isset($_POST["cari"]) ){
        $mahasiswa = cari($_POST["keyword"]); 
    }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

    <!-- Bootsrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />

    <!-- My Css -->
    <link rel="stylesheet" href="css/style.css" />

    <!-- Icon bootsrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">


    <title>Tabel Mahasiswa</title>
  </head>
  <body>

    <nav class="navbar bg-primary">
      <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
          <img class ="nav-logo" src="photo/logo-unpam.png" alt="" width="100px" height="100px">
          <span class="navbar-text fs-1">DATA MAHASISWA SISTEM INFORMASI</span>
        </div>
      </nav>
      <nav class="navbar navbar-light">
        <div class="container-fluid">

          <form class="d-flex" action="" method="post">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="keyword"/>
            <button class="btn bg-light" type="submit" name="cari">Search</button>
          </form>

        </div>
      </nav>
    </nav>

    <section class="tabel">
      <button type="button" class="btn btn-danger tambah-mhs"><a href="logout.php" style="color:white; text-decoration: none;"><i class="bi bi-arrow-left-circle-fill" ></i> logout</a></button>
      <button type="button" class="btn btn-secondary tambah-mhs ms-2"><a href="tambah.php" style="color:white; text-decoration: none;"><i class="bi bi-person-fill-add"></i> Tambah Data Mahasiswa</a></button>

      <table class="table mt-3 ">
        <tr>
          <th class="table-secondary">Nim</th>
          <th class="table-secondary">Foto</th>
          <th class="table-secondary">Nama Mahasiswa</th>
          <th class="table-secondary">Alamat</th>
          <th class="table-secondary">Kota</th>
          <th class="table-secondary">Jenis Kelamin</th>
          <th class="table-secondary">Tanggal Lahir</th>
          <th class="table-secondary">Aksi</th>
        </tr>

        <?php foreach($mahasiswa as $mhs) : ?>
        <tr>
          <td><?= $mhs["nim"]?></td>
          <td><img src="photo/ava/<?= $mhs["gambar"]?>" alt="" width="50"></td>
          <td><?= $mhs["nama_mhs"]?></td>
          <td><?= $mhs["alamat"]?></td>
          <td><?= $mhs["kota"]?></td>
          <td><?php 
                if($mhs["jns_kelamin"] == 'L') {
                  echo "Laki-Laki";
                } else{
                  echo "Perempuan";
                }
          ?></td>
          <td><?= $mhs["tgl_lahir"]?></td>
          <td>
            <a class="btn btn-outline-danger" href="hapus.php?nim=<?=$mhs['nim']?>" onclick="return confirm('yakin?');" role="button"><i class="bi bi-person-fill-dash"></i> Hapus</a> |
            <a class="btn btn-outline-primary" href="update.php?nim=<?=$mhs['nim']?>" role="button"><i class="bi bi-person-fill-gear"></i> Update</a>
          </td>
        </tr>
        <?php endforeach;?>
      </table>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
