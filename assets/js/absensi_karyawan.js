$(document).ready(function () {
    $('#i_karyawan').select2();
    $('#i_jabatan').select2();
    // add();
    // edit();
    dt();
});



function get_data(id) {
    $.ajax({
        type: "get",
        url: url+"?q=get&id="+id,
        dataType: "json",
        success: function (r) {
            if (r.status) {
                var elm = '';
                var key = Object.keys(r.data);
                var formdata = new FormData();
                key.forEach(e => {
                    formdata.append(e,r.data[e]);
                });

                var element = [];
                key.forEach((e,i) => {
                    $('input[name="e_'+e+'"]').val(r.data[e]);
                    $('textarea[name="e_'+e+'"]').val(r.data[e]);

                    elm = $('select[name="e_'+e+'"]')[0]; 

                    if(elm !== undefined){
                        if(typeof elm.dataset.link == "undefined"){
                            element.push(elm.dataset.target_to);
                            // save_target_to.forEach(xx => {
                                let xx = element.find(c => c == 'e_'+e);
                                if(xx != "undefined" &&  typeof elm.dataset.normal != 'undefined'){
                                    $('select[name="e_'+e+'"]').val(r.data[e]);
                                }
                            // });
                        }
                    }

                    if (elm !== undefined) {
                        if(typeof elm.dataset.normal == "undefined"){
                            get_select(r.data[e],'select[name="e_'+e+'"]',[elm.dataset.link,elm.dataset.name,elm.dataset.id],formdata).then(x => {
                                $('select[name="e_'+e+'"]').select2({
                                    dropdownParent: $('#modal_edit'),
                                    width: '100%'
                                });
                            });

                            if (elm.dataset.target_to !== undefined) {
                                var elm_2 = elm;
                                get_select(r.data[elm.dataset.target_to.split('e_')[1]],'select[name="'+elm.dataset.target_to+'"]',[elm.dataset.link_to,elm.dataset.name_to,elm.dataset.id_to],formdata).then(e => {
                                    $('select[name="'+elm_2.dataset.target_to+'"]').select2({
                                        dropdownParent: $('#modal_edit'),
                                        width: '100%'
                                    });
                                });
                            }
                        }
                    }

                });
                
                show_multiple_upload(id);
                show_edit_multiple(r.data);
                show_select_multiple(r.data,formdata);
            }
        }
    });  
}

function show_multiple_upload(id,prifix='') {
    // $(dom).html("");
    $.ajax({
        type: "post",
        url: '../api_custom/Custom/get_program_doc',
        data : {
            program_id : id
        },
        dataType: "json",
        success: function (r) {
            var utama = $('#e_form_upload_multiple > div > table > thead > tr')[0].dataset;
            $('#tbody_e_'+utama.id).html('');
            var dok = $(`#tr_e_${utama.id}> th`);

            if (r.status) {

                var  html = '';
                var id_acak = makeid(12); 

                r.data.forEach(e => {

                    html += '<tr id="tr_x_'+prifix+'_'+id+'_'+id_acak+'">';
                    var no = 1;
                    for (const k in dok) {
                        no++;
                        if (Object.hasOwnProperty.call(form_upload, k)) {
                            const x = form_upload[k];
                            if (typeof x.type != "undefined") {
                                if (x.type == 'select') {
                                    html += `<td><select class="form-control form-control-sm"  type="${x.type}" name="e_${x.name}[]" id="${x.name}${e.id}"></select></td>`;

                                    $(`#${x.name}${e.id}`).val(e[x.name]);
                                }else if(x.type == 'file'){
                                    html += `<td>
                                        <input class="form-control form-control-sm" type="${x.type}" name="e_${x.name}[]" id="${x.name}${e.id}" value="${e[x.name]}">
                                        ${e['file_static']}
                                    </td>`;
                                }else{
                                    html += `<td><input type="hidden" name="e_id_${id}[]"><input class="form-control form-control-sm" type="${x.type}" name="e_${x.name}[]" id="${x.name}${e.id}" value="${e[x.name]}"></td>`;
                                }
                                
                                if (x.type == 'select') {
                                    get_select('','#'+x.name+e.id,[x.link,x.name_2,x.id]).then(p => {
                                        $('#'+x.name_2+e.id).select2({
                                            dropdownParent: $("#modal_edit"),
                                            width: '100%'
                                        });
                                    });
                                }
                            }
                        }
                    }

                html += `<td><input type="hidden" name="id_upd[]"  value="${e.id}"><a href="javascript:void(0);" class="btn btn-sm btn-danger" id="add" onclick="hapus_element('${'#tr_x_'+prifix+'_'+id+'_'+id_acak}','${utama.del_link}','${e.id}')"><i class="fa fa-trash"></i></a></td>`;
                });
                html += '</tr>';
                $(`#tbody_e_${utama.id}`).append(html);  

            }
        }
    });
}

 function edit() { 
    $('#form_edit').submit(function (e) { 
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: url+"?q=up",
            data: new FormData(this),
            processData: false,
            contentType: false,
            dataType: "json",
            success: function (r) {
                if (r.status) {
                    $('#modal_edit').modal('hide');
                    Swal.fire(
                        'Berhasil',
                        r.msg,
                        'success'
                    );
                    dt();
                }else{
                    Swal.fire(
                        'Gagal',
                        r.msg,
                        'error'
                    );
                }
            }
        });
    });
 }

 function del(id) { 
    Swal.fire({
        title: 'Apakah anda yakin ?',
        text: "Anda tidak akan dapat mengembalikan ini!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, hapus!',
        cancelButtonText: 'Batal'
      }).then((result) => {
        if (result.isConfirmed) {         
            $.ajax({
                type: "POST",
                url: url+"?q=del&id="+id,
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




  function add_element(dom,name='',type='',cls='',plc='') { 
    var id = name+makeid(5);
    $(dom).append(`<div class="row mt-2" id="${id}">
        <div class="col-md-8">
            <input type="${type}" name="${name}[]" placeholder="${plc}..." class="${cls} form-control form-control-sm">
        </div>
        <div class="col-md-4">
            <button type="button" class="btn btn-sm btn-danger" onclick="hapus_element('#${id}')">Hapus</button>
        </div>
    </div>`);
    setTimeout(() => {
        $('.select_waktu').datetimepicker({
            format: 'HH:mm a ',
            icons: {
                up: 'fa fa-angle-up',
                down: 'fa fa-angle-down'
            },
            format: 'LT'
    
        });
    }, 500);
  }


  function show_edit_multiple(data) { 
    var name = 'div#form_multiple > div';
    for (const key in $(name)) {
      if (Object.hasOwnProperty.call($(name), key)) {
        const e = $(name)[key];
        if (e.dataset != undefined && e.dataset.id != undefined) {
          edit_multiple_element(data[e.dataset.field_value],e.dataset)
        }
      }
    }
  }

  function show_select_multiple(data,formdata) { 
    var name = '#form_edit';
    let object = $(name)[0];
    for (const k in object) {
        if (Object.hasOwnProperty.call(object, k)) {
            const e = object[k];
                if (e.dataset != undefined && e.dataset.id != undefined) {
                    let cek_id = e.name.split('[]');
                    if (typeof cek_id[1] != 'undefined') {
                        var elm = e.dataset;
                        get_select('','#'+e.id,[elm.link,elm.name,elm.id],formdata).then(x => {
                            $('#'+e.id).select2({
                                dropdownParent: $('#modal_edit'),
                                width: '100%'
                            });
                        })
                    }
                }                
        }
    }
  }

  function edit_multiple_element(data_id=false,dom) {
    var id = dom.name+makeid(5);
    var data = {};

    var entries = new Map([
        [dom.field, data_id],
    ]);
    var obj = Object.fromEntries(entries);
      $.ajax({
          type: "POST",
          url: dom.link,
          data: obj,
          dataType: "json",
          success: function (r) {
            $(dom.id).html('');
            r.data.forEach(e => {                
                $(dom.id).append(`<div class="row mt-2" id="${id}">
                <div class="col-md-8">
                    <input type="${dom.type}" name="${dom.name}[${e['id']}]" placeholder="..." class="form-control form-control-sm" value="${e[dom.field_name]}"> 
                    </div>
                    <div class="col-md-4">
                        <button type="button" class="btn btn-sm btn-danger" onclick="hapus_element('#${id}')">Hapus</button>
                    </div>
                </div>`);
            });

          }
      });
   
  }


 $('#form-filter').submit(function (e) { 
    e.preventDefault();
    dt();
});

function dt() {
    dt_global(
        '#table',
        '../Api/absensi/dt_absensi_karyawan',
        {
            'i_karyawan' : $('#i_karyawan').val(),
            'i_status_absensi' : $('#i_status_absensi').val(),
            'i_jabatan' : $('#i_jabatan').val(),
            'i_date' : $('#i_date').val(),
        },
        [{
            "targets": [0,1],
            "orderable": false
        }]);
}
  

$('#form_filter').submit(function(e) {
    dt();
})
