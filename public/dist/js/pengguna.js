    // Menampilkan Foto pada saat memasukan foto di halaman create pengguna
    function previewImage() {
        var input = document.getElementById('uploadFoto');
        var preview = document.getElementById('previewFoto');

        // Tampilkan gambar yang dipilih
        preview.style.display = 'block';

        var reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
        };

        reader.readAsDataURL(input.files[0]);
    }

      // Fungsi untuk menampilkan preview foto saat dipilih pada halaman edit pengguna
      function previewImage() {
        var input = document.getElementById('uploadFoto');
        var preview = document.getElementById('previewFoto');
        var label = document.querySelector('.custom-file-label');

        // Tampilkan gambar yang dipilih
        preview.style.display = 'block';

        var reader = new FileReader();
        reader.onload = function (e) {
            preview.src = e.target.result;
        };

        reader.readAsDataURL(input.files[0]);

        // Ubah teks pada label
        var fileName = input.files[0].name;
        label.innerHTML = fileName;
    }


    