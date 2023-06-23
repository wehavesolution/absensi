$(document).ready(function () {
    add();
    dt();
    select_jabatan();
    select_jabatan_grp();
});

function add() {
    $('#form_add').submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: hostname + "Api/Jabatan/in_jabatan",
            data: $(this).serialize(),
            dataType: "json",
            success: function (r) {
                if (r.status) {
                    Swal.fire(
                        'Berhasil',
                        r.msg,
                        'success'
                    );

                    $('#add_modal').modal('hide');
                    $('#form_add')[0].reset()
                    dt();
                } else {
                    Swal.fire(
                        'Gagal',
                        r.msg,
                        'error'
                    );
                }
            }, error: function (r) {
                console.log('error : ', r)
            }, complete: function (r) {
                console.log('Complete : ', r)
            }
        });
    });
}

function dt() {
    dt_global(
        '#table',
        '../Api/jabatan/dt_jabatan',
        {},
        [{
            "targets": [0, 1],
            "orderable": false
        }]);
}

function select_jabatan() { 
    let obj = {
        path : 'Api/jabatan/get_jabatan',
        id_dom: '#parent',
        key : "id",
        value: "nma_jabatan"
      }
    select(obj);
}

function select_jabatan_grp() { 
    let obj = {
        path : 'Api/jabatan/get_jabatan_grup',
        id_dom: '#grp_jabatan_id',
        key : "id",
        value: "nama_group"
      }
    select(obj);
}