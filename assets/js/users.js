$(document).ready(function () {
    add();
    dt();
    select_jabatan();
    form_ganti_pw();
    form_reset_cuti();
});

function add() {
    $('#form_add').submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: hostname + "Api/Users/in_users",
            data: $(this).serialize(),
            dataType: "json",
            success: function (r) {
                if (r.status) {
                    Swal.fire(
                        'Berhasil',
                        r.msg,
                        'success'
                    );
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
        '../Api/Users/dt_users',
        {},
        [{
            "targets": [0, 1],
            "orderable": false
        }]);
}

function select_jabatan() { 
    let obj = {
        path : 'Api/Jabatan/get_jabatan',
        id_dom: '#jabatan_id',
        key : "id",
        value: "nma_jabatan"
      }
    select(obj);
}

function ganti_password(id="",nama="") { 
    $('#users_id').val(id);
    $('#val_name').text(` - ${nama}`);
}

function form_ganti_pw() {
    $('#form_ganti_pw').submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: hostname + "Api/Users/ganti_password",
            data: $(this).serialize(),
            dataType: "json",
            success: function (r) {
                if (r.status) {
                    Swal.fire(
                        'Berhasil',
                        r.msg,
                        'success'
                    );

                    $('#form_ganti_pw')[0].reset()
                    $('#ganti_pw_modal').modal('hide');
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

function form_reset_cuti() {
    $('#form_reset_cuti').submit(function (e) {
        e.preventDefault();
        Swal.fire({
            title: 'Apakah anda yakin ?',
            text: "Jatah cuti akan dikembalikan sebanyak 12 kali dan Anda tidak dapat mengembalikan proses ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Tidak!',
            cancelButtonText: 'Batal'
          }).then((result) => {
            if (result.isConfirmed) {         
                $.ajax({
                    type: "POST",
                    url: hostname + "Api/CutiKaryawan/reset_cuti",
                    data: $(this).serialize(),
                    dataType: "json",
                    success: function (r) {
                        if (r.status) {
                            Swal.fire(
                                'Berhasil',
                                r.msg,
                                'success'
                            );
        
                            $('#reset_cuti_modal').modal('hide');
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
            }
          })
    });
}