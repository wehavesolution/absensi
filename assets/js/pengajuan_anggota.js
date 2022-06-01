$(document).ready(function () {
    dt();
});


function dt() {
    dt_global(
        '#table',
        '../Api/pengajuan/dt_pengajuan_anggota',
        {
            'i_karyawan' : $('#i_karyawan').val(),
            'i_status' : $('#i_status').val(),
            'i_date' : $('#i_date').val(),
            'i_diterima' : $('#i_diterima').val(),
        },
        [{
            "targets": [0,2],
            "orderable": false
        }]);
}


$('#form_filter').submit(function(e) {
    dt();
})
  
