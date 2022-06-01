$(document).ready(function () {
    dt();
});

function dt() {
    dt_global(
        '#table',
        '../Api/absensi/dt_absensi_anggota',
        {
            'i_karyawan' : $('#i_karyawan').val(),
            'i_status_absensi' : $('#i_status_absensi').val(),
            'i_jabatan' : $('#i_jabatan').val(),
            'i_date' : $('#i_date').val(),
        },
        [{
            "targets": [0,1],
            "orderable": false
        }]);
}
  

$('#form_filter').submit(function(e) {
    dt();
})
