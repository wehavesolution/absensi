$(document).ready(function () {
    
});

function tindaklanjuti(accept=null) { 
    Swal.fire({
        title: 'Perhatian',
        text: "Apakah anda yakin ingin menindaklanjuti ini ?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya',
        cancelButtonText: 'Batal'
      }).then((result) => {
        if (result.isConfirmed) {         
            $.ajax({
                type: "POST",
                url: "../Api/Pengajuan/tindaklanjutiPengajuan",
                data: {
                    pengajuan_id : $('#id_pengajuan_id').val(),
                    ctdby : $('#id_ctdby').val(),
                    accept : accept,
                    keterangan : $('#id_keterangan').val()
                },
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
                }
            });
        }
      })
  }