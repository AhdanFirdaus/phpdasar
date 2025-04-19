<?php
// $mahasiswa = [
//   ["dadan", "040457882", "Teknik Informatika", "fake@email.com"],
//   ["ahdan", "049228356", "Hacker", "fake@email.com"]
// ];

// Array Associative
// definisinya sama seperti array numerik, kecuali
// key-nya adalah string yang kita buat sendiri

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
    // "tugas" => [100, 90, 85]
  ]
  ];

// echo $mahasiswa[1]["tugas"][1];
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
  <ul>
    <li>
      <img src="img/<?= $m["gambar"]?>" alt="gambar">
    </li>
    <li>Nama : <?= $m["nama"];?></li>
    <li>NRP : <?= $m["nrp"];?></li>
    <li>Jurusan : <?= $m["jurusan"];?></li>
    <li>Email : <?= $m["email"];?></li>
  </ul>
  <?php endforeach;?>
</body>
</html>