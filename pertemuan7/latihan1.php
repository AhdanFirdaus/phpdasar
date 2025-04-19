<?php 
// variabel scope / lingkup variable
// $x = 10;

// function tampilX() {
//   global $x;
//   echo $x;
// }

// tampilX();

// SUPERSGLOBALS
// variabel global milik php
// merupakan Array Associative
// var_dump($_SERVER["SERVER_NAME"]);

// $_GET
$mahasiswa = [
  [
    "nama" => "dadan",
    "nrp" => "04051232139",
    "email" => "dadan@fakeemail.com",
    "jurusan" => "Teknik Informatika",
    "gambar" => "superdadan.png"
  ],
  [
    "nama" => "ahdan",
    "nrp" => "04113e35466",
    "email" => "ahdan@fakeemail.com",
    "jurusan" => "Teknik Industri" ,
    "gambar" => "superdadan.png"
  ]
  ];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Mahasiswa</title>
</head>
<body>
  <h1>Daftar Mahasiswa</h1>
  <?php foreach($mahasiswa as $m) : ?>
    <li>
      <a href="latihan2.php?nama=<?= $m["nama"];?>&nrp=<?= $m["nrp"];?>&email=<?= $m["email"];?>&jurusan=<?= $m["jurusan"];?>&gambar=<?= $m["gambar"];?>"><?= $m["nama"]; ?></a>
    </li>
  <?php endforeach;?>
</body>
</html>