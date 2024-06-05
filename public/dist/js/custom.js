$(function () {
  "use strict";

  $(".preloader").fadeOut();
  // this is for close icon when navigation open in mobile view
  $(".nav-toggler").on("click", function () {
    $("#main-wrapper").toggleClass("show-sidebar");
  });
  $(".search-box a, .search-box .app-search .srh-btn").on("click", function () {
    $(".app-search").toggle(200);
    $(".app-search input").focus();
  });

  // ==============================================================
  // Resize all elements
  // ==============================================================
  $("body, .page-wrapper").trigger("resize");
  $(".page-wrapper").delay(20).show();

  //****************************
  /* This is for the mini-sidebar if width is less then 1170*/
  //****************************
  var setsidebartype = function () {
    var width = window.innerWidth > 0 ? window.innerWidth : this.screen.width;
    if (width < 1170) {
      $("#main-wrapper").attr("data-sidebartype", "mini-sidebar");
    } else {
      $("#main-wrapper").attr("data-sidebartype", "full");
    }
  };
  $(window).ready(setsidebartype);
  $(window).on("resize", setsidebartype);
});

// datepicker tanggal
$(document).ready(function() {
  $('#tanggal').datepicker({
      format: 'dd-mm-yyyy' 
  });
});

// datepicker tanggal keluar (barang keluar)
$(document).ready(function() {
  $('#tanggalkeluar').datepicker({
      format: 'dd-mm-yyyy'
  });
});

// script pada barang-keluar mengenai ruangan, barang dan kode barang
document.getElementById('ruangan').addEventListener('change', function() {
  var ruangan = this.value;
  var barangSelect = document.getElementById('barang');
  var kodeInput = document.getElementById('kode');

  // Clear previous options
  barangSelect.innerHTML = '<option value=""> - Pilih Barang - </option>';
  kodeInput.value = '';

  if (ruangan) {
      fetch(`/admin/barang-keluar/getBarangByRuangan/${ruangan}`)
          .then(response => response.json())
          .then(data => {
              data.forEach(function(barang) {
                  var option = document.createElement('option');
                  option.value = barang.barang_nama;
                  option.text = barang.barang_nama;
                  barangSelect.add(option);
              });
          });
  }
});

document.getElementById('barang').addEventListener('change', function() {
  var barangNama = this.value;
  var kodeInput = document.getElementById('kode');

  if (barangNama) {
      fetch(`/admin/barang-keluar/getBarangByNama/${barangNama}`)
          .then(response => response.json())
          .then(data => {
              console.log(data); // Debugging
              if (data) {
                  kodeInput.value = data.barang_kode; // Assuming barang_kode is the field you need
              } else {
                  kodeInput.value = '';
              }
          });
  } else {
      kodeInput.value = '';
  }
});