
function previewImage() {
    var input = document.getElementById('uploadFoto');
    var preview = document.getElementById('previewFoto');

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block'; // Tampilkan pratinjau foto
        };

        reader.readAsDataURL(input.files[0]);
    }
}
