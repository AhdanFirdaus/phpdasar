<?php
require 'functions.php';

$mahasiswa = query("SELECT * FROM mahasiswa");
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
    <h1>Daftar Mahasiswa</h1>

    <a href="tambah.php" class="btn btn-primary m-3">Tambah Data Mahasiswa</a>
    
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
          <td><img src="img/<?= $mhs["gambar"]; ?>"></td>
          <td><?= $mhs["nrp"]; ?></td>
          <td><?= $mhs["email"]; ?></td>
          <td><?= $mhs["jurusan"]; ?></td>
          <td><a href="" class="btn btn-primary">Ubah</a>  <a href="hapus.php?id=<?= $mhs["id"]; ?>" class="btn btn-danger" onclick="return confirm('yakin?');">Hapus</a></td>
        </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
      </tbody>
    </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>