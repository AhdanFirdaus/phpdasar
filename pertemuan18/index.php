<?php
session_start();
if(!isset($_SESSION['login'])) {
  header('Location: login.php');
  exit;
}
require 'functions.php';

// pagination
// konfigurasi
$jumlahDataPerHalaman = 2;
$jumlahData = count(query("SELECT * FROM mahasiswa"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = (isset($_GET["page"])) ? $_GET["page"] : 1;
$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

$mahasiswa = query("SELECT * FROM mahasiswa LIMIT $awalData, $jumlahDataPerHalaman");

// tombol cari ditekan
if(isset($_POST["cari"])) {
  $mahasiswa = cari($_POST["keyword"]);
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>

    
    <div class="container d-flex flex-column  justify-content-center align-items-center mt-5">
    <a href="logout.php" class="btn btn-danger text-center">Logout</a>
    <h1>Daftar Mahasiswa</h1>

    <a href="tambah.php" class="btn btn-primary m-3">Tambah Data Mahasiswa</a>
    
    <form class="d-flex my-4" role="search" action="" method="post">
        <input class="form-control me-2" type="text" name="keyword" placeholder="Masukan keyword pencarian..." aria-label="Search" size="50" autofocus autocomplete="off">
        <button class="btn btn-outline-primary" type="submit" name="cari">Search</button>
    </form>

    <!-- navigasi -->
    <nav>
      <ul class="pagination">
        <?php if($halamanAktif > 1) : ?>
        <li class="page-item">
          <a class="page-link" href="?page=<?= $halamanAktif - 1; ?>" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
          </a>
        </li>
        <?php endif; ?>
        <?php for($i = 1; $i <= $jumlahHalaman; $i++) : ?>
          <?php if($i == $halamanAktif) : ?>
            <li class="page-item"><a class="page-link active" href="?page=<?= $i; ?>"><?= $i; ?></a></li>
          <?php else : ?>
            <li class="page-item"><a class="page-link" href="?page=<?= $i; ?>"><?= $i; ?></a></li>
          <?php endif; ?>
        <?php endfor; ?>
        <?php if($halamanAktif < $jumlahHalaman) : ?>
        <li class="page-item">
          <a class="page-link" href="?page=<?= $halamanAktif + 1; ?>" aria-label="Previous">
            <span aria-hidden="true">&raquo;</span>
          </a>
        </li>
        <?php endif; ?>
      </ul>
    </nav>

    <table class="table">
      <thead>
        <tr>
          <th scope="col">No.</th>
          <th scope="col">Nama</th>
          <th scope="col">Gambar</th>
          <th scope="col">NRP</th>
          <th scope="col">Email</th>
          <th scope="col">Jurusan</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1; ?>
        <?php foreach($mahasiswa as $mhs) :?>
          <tr>
          <th scope="row"><?= $i; ?></th>
          <td><?= $mhs["nama"]; ?></td>
          <td><img src="img/<?= $mhs["gambar"]; ?>" width="100"></td>
          <td><?= $mhs["nrp"]; ?></td>
          <td><?= $mhs["email"]; ?></td>
          <td><?= $mhs["jurusan"]; ?></td>
          <td>
            <a href="ubah.php?id=<?= $mhs["id"]; ?>" class="btn btn-primary">Ubah</a>  
            <a href="hapus.php?id=<?= $mhs["id"]; ?>" class="btn btn-danger" onclick="return confirm('yakin?');">Hapus</a>
          </td>
        </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
      </tbody>
    </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>