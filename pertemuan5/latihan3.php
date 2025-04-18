<?php
$mahasiswa = [
  ["dadan", "040457882", "Teknik Informatika", "fake@email.com"],
  ["ahdan", "049228356", "Hacker", "fake@email.com"]
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
  <ul>
    <!-- <?php foreach($mahasiswa as $m) : ?>
      <li><?= $m;?></li>
    <?php endforeach;?> -->
  </ul>
  
  <?php foreach($mahasiswa as $m) : ?>
  <ul>
    <li><?= $m[0];?></li>
    <li><?= $m[1];?></li>
    <li><?= $m[2];?></li>
    <li><?= $m[3];?></li>
  </ul>
  <?php endforeach;?>
</body>
</html>