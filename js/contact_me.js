$(function() {
  $("#contactForm").submit(function(event) {
      event.preventDefault(); // Mencegah formulir disubmit secara default

      // Mengambil data formulir
      var formData = $(this).serialize();

      // Mengirim data ke server menggunakan AJAX
      $.ajax({
          type: "POST",
          url: $(this).attr("action"), // Mengambil URL tindakan formulir dari atribut 'action'
          data: formData, // Menggunakan data formulir yang telah diambil
          success: function(response) { // Fungsi ini akan dipanggil jika permintaan AJAX berhasil
              $("#success").html(response); // Menampilkan pesan respons di elemen dengan ID 'success'
          }
      });
  });
});
