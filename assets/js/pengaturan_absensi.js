$(document).ready(function () {
});

$('#form_pengaturan').submit(function (e) { 
    e.preventDefault();
    simpanPengaturan();
});

function simpanPengaturan() {
    Swal.fire({
        title: 'Kofirmasi!',
        text: "Apakah anda yakin ingin mengubah pengaturan absensi ini ?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya',
        cancelButtonText: `Tidak`,
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "POST",
                url: "../Api/Absensi/setPengaturan",
                data: $('#form_pengaturan').serialize(),
                dataType: "json",
                success: function (r) {
                    if (r.status) {
                        Swal.fire(
                            'Berhasil',
                            r.msg,
                            'success'
                        );
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
        }
    })
}
