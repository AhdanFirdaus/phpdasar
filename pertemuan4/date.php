<?php
// date
// untuk menampilkan tanggal dengan format tertentu
// echo date("l, d-M-Y");

// time
// unix timestamp / epoch time
// detik yang sudah berlalu sejak 1 januari 1970
// echo time();
// echo date("l, d M Y", time()+60*60*24*100);

// mktime
// membuat sendiri detik 
// mktime(0,0,0,0,0,0)
// jam, menit, detik, bulan, tanggal, tahun
// echo date("l", mktime(0,0,0,4,27,2008));

// strtotime
// echo date("l", strtotime("27 Apr 2008"));
?>