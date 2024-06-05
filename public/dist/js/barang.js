// Fungsi untuk mengisi isian dari barang yang dipilih dari gudang
function fillData(selectElement) {
    var selectedOption = selectElement.options[selectElement.selectedIndex];
    
    // Mengisi input form dengan nilai dari atribut opsi yang dipilih
    document.getElementById('kode').value = selectedOption.getAttribute('data-kode') || '';
    document.getElementById('pembelian').value = selectedOption.getAttribute('data-tahun') || '';
    document.getElementById('spesifikasi').value = selectedOption.getAttribute('data-spesifikasi') || '';
    document.getElementById('kondisi').value = selectedOption.getAttribute('data-kondisi') || '';
    document.getElementById('penanggungjawab').value = selectedOption.getAttribute('data-penanggungjawab') || '';

    // Memanggil fungsi fillDataRuangan untuk mengisi kode ruangan
    fillDataRuangan(document.getElementById('ruangan'));
}

// Fungsi untuk mengisi kode ruangan otomatis berdasarkan nama ruangan yang dipilih
function fillDataRuangan(selectElement) {
    var selectedOption = selectElement.options[selectElement.selectedIndex];

    // Mengisi nilai pada input koderuangan berdasarkan ruangan yang dipilih
    document.getElementById('koderuangan').value = selectedOption.value || '';
}

// Mendapatkan elemen select ruangan
var ruanganSelect = document.getElementById("ruangan");

// Mendapatkan elemen input koderuangan
var koderuanganInput = document.getElementById("koderuangan");

// Mendengarkan perubahan pada elemen select ruangan
ruanganSelect.addEventListener("change", function () {
    // Memanggil fungsi fillDataRuangan untuk mengisi data pada form
    fillDataRuangan(ruanganSelect);
});


// Halaman Edit supaya ketika pengguna memindahkan barang maka kode ruangan juga akan terganti otomatis
function updateKodeRuangan() {
    // Dapatkan elemen select
    var selectRuangan = document.getElementById('selectRuangan');

    // Dapatkan elemen input kode ruangan
    var inputKodeRuangan = document.getElementById('inputKodeRuangan');

    // Dapatkan nilai kode ruangan terpilih
    var selectedOption = selectRuangan.options[selectRuangan.selectedIndex];
    var kodeRuangan = selectedOption.getAttribute('data-kode');

    // Update nilai input kode ruangan
    inputKodeRuangan.value = kodeRuangan;
}

