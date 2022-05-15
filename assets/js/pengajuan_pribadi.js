$(document).ready(function () {
    dt();
});



function dt() {
    dt_global(
        '#table',
        '../Api/pengajuan/dt_pengajuan_personal',
        {
            'year_from' : $('#year_from').val(),
            'year_to' : $('#year_to').val(),
        },
        [{
            "targets": [0,2],
            "orderable": false
        }]);
}
  
