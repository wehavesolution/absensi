$(document).ready(function () {
    dt();
});

function dt() {
    dt_global(
        '#table',
        '../Api/absensi/dt_monitoring_absensi',
        {
            'i_date_start' : $('#i_date_start').val(),
            'i_date_end' : $('#i_date_end').val()
        },
        [{
            "targets": [0,1],
            "orderable": false
        }]);
}
  

$('#form_filter').submit(function(e) {
    dt();
})