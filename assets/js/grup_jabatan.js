$(document).ready(function () {
    add();
    dt();
});

function add() {
    $('#form_add').submit(function (e) { 
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: hostname+"Api/Jabatan/in_jabatan_grup",
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
                }else{
                    Swal.fire(
                        'Gagal',
                        r.msg,
                        'error'
                    );
                }
            },error : function (r) { 
                console.log('error : ',r)
            },complete : function (r) { 
                console.log('Complete : ', r)
            }
        });
    });    
}

function dt() {
    dt_global(
        '#table',
        '../Api/jabatan/dt_jabatan_grup',
        {},
        [{
            "targets": [0,1],
            "orderable": false
        }]);
}