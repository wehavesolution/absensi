var myChart = echarts.init(document.getElementById('grafik_absensi'));

$(document).ready( async function () {
    // add();
    // edit();
  await bar();
  getChart().then(x => {
    myChart.setSeries(x);
  })
  dt();
});


 $('#form-filter').submit(function (e) { 
    e.preventDefault();
    dt();
    getChart().then(x => {
        myChart.setSeries(x);
      })
});

function dt() {
    dt_global(
        '#table',
        $('#link_dt').val(),
        {
            tahun : $('select[name="tahun"]').val()
        },
        [{
            "targets": [0,2],
            "orderable": false
        }]);
}

function getChart() { 
   return  new Promise((resolve, reject) => {
        $.ajax({
            type: "post",
            url: $('#link_grafik').val(),
            data: $('#form-filter').serialize(),
            dataType: "json",
            success: function (r) {
                let d = [];
                r.forEach(x => {
                    d.push({
                        name: x.nama,
                        type: 'bar',
                        emphasis: {
                        focus: 'series'
                        },
                        data: x.value
                    });
                });

                resolve(d);
            }
        });
    });
}  

async function bar() { 
    const labelOption = "asfas";
   
   var option = {
       tooltip: {
       trigger: 'axis',
       axisPointer: {
         type: 'shadow'
       }
     },
     legend: {
       data: ['Tepat Waktu', 'Telat', 'Cuti']
     },
     toolbox: {
       show: true,
       orient: 'vertical',
       left: 'right',
       top: 'center',
       feature: {
         restore: { show: true, title : "Memuat Ulang" },
         saveAsImage: { show: true, title : "Simpan Gambar" }
       }
     },
     xAxis: [
       {
         type: 'category',
         axisTick: { show: false },
         data: ['Januari', 'Februari', 'Maret', 'April', 'Mei','Juni','Juli','Agustus','Oktober','November','Desember']
       }
     ],
     yAxis: [
       {
         type: 'value'
       }
     ],
     series: [
       {
         name: 'Tepat Waktu',
         type: 'bar',
         barGap: 0,
         label: labelOption,
         emphasis: {
           focus: 'series'
         },
         data: [320, 332, 301, 334, 390]
       },
       {
         name: 'Telat',
         type: 'bar',
         label: labelOption,
         emphasis: {
           focus: 'series'
         },
         data: [220, 182, 191, 234, 290]
       },
       {
         name: 'Cuti',
         type: 'bar',
         label: labelOption,
         emphasis: {
           focus: 'series'
         },
         data: [150, 232, 201, 154, 190]
       },
     ]
   };
   
   // 使用刚指定的配置项和数据显示图表。
   myChart.setOption(option);
   }
