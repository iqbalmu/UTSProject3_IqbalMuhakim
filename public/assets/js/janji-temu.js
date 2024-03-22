// mengirim data ke modal
$(document).ready(function () {
    // Ketika modal ditampilkan
    $('#modalUpdateStatusTemu').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Tombol yang memicu modal
        var antrianId = button.data('antrian-id'); // Ekstrak informasi dari data-* atribut
        var pasien = button.data('nama-pasien'); // Ekstrak informasi dari data-* atribut
        var dokter = button.data('nama-dokter'); // Ekstrak informasi dari data-* atribut
        // Memperbarui konten modal
        var modal = $(this);
        modal.find('#antrianId').val(antrianId);
        modal.find('#input-pasien').val(pasien);
        modal.find('#input-dokter').val(dokter);
        modal.find('.nomor').text(antrianId);
    });
});
