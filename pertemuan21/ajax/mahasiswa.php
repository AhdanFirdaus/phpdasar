<?php 
// sleep(1);
usleep(500000);
require '../functions.php';
$keyword = $_GET['keyword'];
$query = "SELECT * FROM mahasiswa WHERE 
          nama LIKE '%$keyword%' OR
          nrp LIKE '%$keyword%' OR
          email LIKE '%$keyword%' OR
          jurusan LIKE '%$keyword%' 
          ";
$mahasiswa = query($query);
?>

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