let a;
let time;
const hostname = "http://localhost/absensi/";

function addZero(i) {
    if (i < 10) {i = "0" + i}
    return i;
  }
setInterval(() => {
  const d = new Date();
  let h = addZero(d.getHours());
  let m = addZero(d.getMinutes());
  time = h + ':' + m;
  document.getElementById('jam_realtime').innerHTML = time;
}, 1000);

$(document).ready(function () {
    closeModal();
    pilih_pengajuan('CTI')
    kirimPengajuan();
    get_jml_cuti();
});

function setAbsenMasuk(e) {
    setTimeout(() => {
    takeGambar();
    },500);
    Swal.fire({
        title: 'Lanjutkan Absen ?',
        text: "Lanjutkan absen sekarang!",
        icon: 'warning',
        html:`<div id="result"></div>`,
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya',
        cancelButtonText: `Tidak`,
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "POST",
                url: hostname+"Api/Absensi/setAbsenMasuk",
                data: {
                    img : $('#result > img').attr('src')
                },
                dataType: "json",
                beforeSend: function (r) { 
        
                },
                success: function (r) {
                    if (r.status) {
                        Swal.fire(
                            'Berhasil',
                            r.msg,
                            'success'
                        );
        
                        if (r.callback) {
                            $('#text_response').html(r.callback);
                            $('#form_absensi').html(`
                            <form action="javascript:void(0);" onsubmit="setAbsenPulang(this)" method="post">
                                <button class="btn btn-danger" type="submit">Ya</button>
                                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal" aria-label="Close">Tidak</button>
                            </form>`)
                        }
        
                        $('#modal_absensi').modal('hide');
                    }else{
                        Swal.fire(
                            'Gagal',
                            r.msg,
                            'error'
                        );
        
                        $('#text_response').html(r.msg);
                        $('#form_absensi').html(`
                        <form action="javascript:void(0);" onsubmit="setAbsenPulang(this)" method="post">
                            <button class="btn btn-danger" type="submit">Ya</button>
                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal" aria-label="Close">Tidak</button>
                        </form>`)
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

function setAbsenPulang(e) {
        setTimeout(() => {
           takeGambar();
        },500);
        Swal.fire({
            title: 'Lanjutkan Absen ?',
            text: "Lanjutkan absen sekarang!",
            icon: 'warning',
            html:`<div id="result"></div>`,
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya',
            cancelButtonText: `Tidak`,
          }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: hostname+"Api/Absensi/setAbsenPulang",
                    data: {
                        img : $('#result > img').attr('src')
                    },
                    dataType: "json",
                    beforeSend: function (r) { 
            
                    },
                    success: function (r) {
                        if (r.status) {
                            Swal.fire(
                                'Berhasil',
                                r.msg,
                                'success'
                            );
                            
                            if (r.callback) {
                                $('#text_response').html(r.callback);
                                if (r.callback_link) {
                                    $('#form_absensi').html(`
                                    <a href="${r.callback_link}">
                                        <button class="btn btn-secondary">Cek Absen</button>
                                    </a>`)                        
                                }
                            }
                            
                            $('#modal_absensi').modal('hide');
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

function bukaKamera() { 
    $('#form-kamera').html(`<video id="video" width="100%" autoplay></video>`);
    // Grab elements, create settings, etc.
var video = document.getElementById('video');

// Get access to the camera!
if(navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
    // Not adding `{ audio: true }` since we only want video now
    navigator.mediaDevices.getUserMedia({ video: true }).then(function(stream) {
        //video.src = window.URL.createObjectURL(stream);
        video.srcObject = stream;
        video.play();
    });
}

/* Legacy code below: getUserMedia 
else if(navigator.getUserMedia) { // Standard
    navigator.getUserMedia({ video: true }, function(stream) {
        video.src = stream;
        video.play();
    }, errBack);
} else if(navigator.webkitGetUserMedia) { // WebKit-prefixed
    navigator.webkitGetUserMedia({ video: true }, function(stream){
        video.src = window.webkitURL.createObjectURL(stream);
        video.play();
    }, errBack);
} else if(navigator.mozGetUserMedia) { // Mozilla-prefixed
    navigator.mozGetUserMedia({ video: true }, function(stream){
        video.srcObject = stream;
        video.play();
    }, errBack);
}
*/}


function stopKamera() {
    var video = document.getElementById('video');
    const stream = video.srcObject;
    const tracks = stream.getTracks();
  
    tracks.forEach(function(track) {
      track.stop();
    });
  
    video.srcObject = null;
  }

function takeGambar() { 
    // Elements for taking the snapshot
    var canvas = document.getElementById('canvas');
    var ctx = canvas.getContext('2d');
    var video = document.getElementById('video');
    
	ctx.drawImage(video, 0, 0, 340, 150);

    var img = new Image();
    img.width = 150;
    img.height = 150;
    img.src = canvas.toDataURL();
    
    $('#result').html(img);
    return canvas.toDataURL();
}


function closeModal() { 
    var myModalEl = document.getElementById('modal_absensi')
    myModalEl.addEventListener('hidden.bs.modal', function (event) {
      stopKamera();
    })
 }

//  Pengajuan
function kirimPengajuan() {
    $('#form_pengajuan').submit(function (e) { 
            e.preventDefault();
        if(!cek_jatah_cuti()){
            $.ajax({
                type: "POST",
                url: hostname+"Api/Pengajuan/kirimPengajuan",
                data: $(this).serialize(),
                dataType: "json",
                beforeSend: function (r) { 
    
                },
                success: function (r) {
                    if (r.status) {
                        Swal.fire(
                            'Berhasil',
                            r.msg,
                            'success'
                        );
    
                        $('#modal_pengajuan').modal('hide');
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
    });    
}

// Datatable

function dt_global(dom="#table",link="", data={}, column=[], exports=false) {
    $(dom).DataTable({
       dom: 'Bfrtip',
       buttons:  exports ? ['copy', 'csv', 'excel', 'pdf', 'print'] : [],
        // Processing indicator
        "bAutoWidth": false,
        "destroy": true,
        "searching": true,
        "processing": true,
        // DataTables server-side processing mode
        "serverSide": true,
        "scrollY": "350px",
        "scrollX": "350px",
        "scrollCollapse": true,
        // Initial no order.
        "order": [],
        // Load data from an Ajax source
        "ajax": {
            "url": link,
            "type": "POST",
            "data" : data
            // "data" : {
            //     'f_status' : $('#f_status').val(),
            //     'f_kategori_peng' : $('#f_kategori_peng').val(),
            //     'f_date_interval' : $('#f_date_interval').val(),
            //     'operator' : $('#operator').val()
            // }
        },
        //Set column definition initialisation properties
        "columnDefs": column
    });
    
  }

  function pilih_pengajuan(params='') {
    if(params == "CTI"){
        $('#div_jumlah_hari').show();
    }else{
        $('#div_jumlah_hari').hide();
    }
  }

  function get_jml_cuti() {
    $.ajax({
        type: "POST",
        url: hostname+"Api/CutiKaryawan/self_jml_cuti_karyawan",
        dataType: "json",
        success: function (r) {
            if (r.status) {
             $('#info_jml_cuti').html(`<div class="alert alert-soft-primary" role="alert">
             Jatah cuti anda saat ini :<b> ${r.data}</b><input type="hidden" id="jml_jatah_cuti" value="${r.data}">
           </div>`);
            }
        },error : function (r) { 
            console.log('error : ',r)
        },complete : function (r) { 
            console.log('Complete : ', r)
        }
    });
  }

  function cek_jatah_cuti() {
    let result = false;
    if($('#jml_jatah_cuti').val() == 0 && $('#status_pengajuan').val() == "CTI"){
        Swal.fire(
            'Gagal',
            `Jatah cuti anda sudah habis`,
            'error'
        );

        result = true;
    }else if(($('#jumlah_hari').val() == 0 || $('#jumlah_hari').val() == '') && $('#status_pengajuan').val() == "CTI"){
        Swal.fire(
            'Gagal',
            `Jumlah hari cuti harus di isi`,
            'error'
        );

        result = true;
    }else if(parseInt($('#jumlah_hari').val()) > parseInt($('#jml_jatah_cuti').val()) && $('#status_pengajuan').val() == "CTI"){
        Swal.fire(
            'Gagal',
            `Jumlah hari cuti melebihi batas, jatah cuti anda saat ini ${$('#jml_jatah_cuti').val()} `,
            'error'
        );

        result = true;
    }


    return result;
  }

  
  function select(obj=null) {
    if (obj) {
        $.ajax({
            type: "POST",
            url: hostname+obj.path,
            data: $(this).serialize(),
            dataType: "json",
            success: function (r) {
                if (r.status) {
                    let html = '';
                    r.data.forEach(e => {
                        html = `<option value="${e[obj.key]}">${e[obj.value]}</option>`;
                        $(obj.id_dom).append(html);
                    });
                }
            },error : function (r) { 
                console.log('error : ',r)
            },complete : function (r) { 
                console.log('Complete : ', r)
            }
        });  
    }else{
        console.log('Obj select cannot be null')
    }
  }