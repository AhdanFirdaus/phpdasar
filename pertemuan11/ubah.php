<?php
require "functions.php";

// ambil data di URL
$id = $_GET["id"];
// query data mahasiswa berdasarakan id
$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];

// Cek apakah tombol submit ditekan
if (isset($_POST["submit"])) {
  // cek apakah data berhasil di ubah atau tidak
  if(ubah($_POST) > 0) {
    echo "
      <script>
        alert('data berhasil diubah!');
        document.location.href = 'index.php';
      </script>
    ";
  } else {
    echo "
      <script>
        alert('data gagal diubah!');
        document.location.href = 'index.php';
      </script>
    ";
  }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ubah Data Mahasiswa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
  
<div class="container mt-5">
<h1>Ubah Data Mahasiswa</h1>  
<form action="" method="post">
  <input type="hidden" name="id" value="<?= $mhs["id"]?>">
  <div class="mb-3">
    <label for="nama" class="form-label">Nama :</label>
    <input type="text" name="nama" class="form-control" id="nama" value="<?= $mhs["nama"]?>">
  </div>
  <div class="mb-3">
    <label for="nrp" class="form-label">NRP :</label>
    <input type="text" name="nrp" class="form-control" id="nrp" require value="<?= $mhs["nrp"]?>">
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email :</label>
    <input type="email" name="email" class="form-control" id="email" value="<?= $mhs["email"]?>">
  </div>
  <div class="mb-3">
    <label for="jurusan" class="form-label">Jurusan :</label>
    <input type="text" name="jurusan" class="form-control" id="jurusan" value="<?= $mhs["jurusan"]?>">
  </div>
  <div class="mb-3">
    <label for="gambar" class="form-label">Gambar :</label>
    <input type="text" name="gambar" class="form-control" id="gambar" value="<?= $mhs["gambar"]?>">
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Ubah Data!</button>
</form>
</div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>