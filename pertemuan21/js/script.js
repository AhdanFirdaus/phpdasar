$(document).ready(function() {
  // hilangkan tombol cari
  $('#tombol-cari').hide();

  // event ketika keyword ditulis
  $('#keyword').on('keyup', function() {
    // munculkan icon loading
    $('.spinner-border').removeClass('d-none');
    
    // ajax menggunakan load
    // $('#container').load('ajax/mahasiswa.php?keyword=' + $('#keyword').val());
    
    // $.get()
    $.get('ajax/mahasiswa.php?keyword=' + $('#keyword').val(), function(data) {
      
      $('#container').html(data);
      $('.spinner-border').addClass('d-none');

    });
  })

});