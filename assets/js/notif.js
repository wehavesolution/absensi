$(document).ready(function () {
    dt();
});

function dt() {
    dt_global(
        '#table',
        'Api/notif/dt_notif',
        {},
        [{
            "targets": [0,2],
            "orderable": false
        }]);
}
  
