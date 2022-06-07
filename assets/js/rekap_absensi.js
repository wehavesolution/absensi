var myChart = echarts.init(document.getElementById('grafik_absensi_pertahun'));

$(document).ready( async function () {
  await bar();
  getChartTahun().then(x => {
    myChart.setSeries(x);
  })
  dt();
});


 $('#form-filter').submit(function (e) { 
    e.preventDefault();
    dt();
    getChartTahun().then(x => {
        myChart.setSeries(x);
      })
});

function dt() {
    dt_global(
        '#table',
        $('#link_dt').val(),
        {
            'i_karyawan' : $('#i_karyawan').val(),
            'i_status_absensi' : $('#i_status_absensi').val(),
            'i_jabatan' : $('#i_jabatan').val(),
            'i_date_start' : $('#i_date_start').val(),
            'i_date_end' : $('#i_date_end').val(),
        },
        [{
            "targets": [0,1],
            "orderable": false
        }],
        exports = true
        );
}
  

function getChartTahun() { 
   return  new Promise((resolve, reject) => {
        $.ajax({
            type: "post",
            url: $('#link_grafik_pertahun').val(),
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

function getChartBulan() { 
    return  new Promise((resolve, reject) => {
         $.ajax({
             type: "post",
             url: $('#link_grafik_pertahun').val(),
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

async function pie() { 
    let option = {
        title: {
          left: 'center'
        },
        toolbox: {
            show: true,
            orient: 'horizontal',
            left: 'right',
            top: 'center',
            feature: {
              restore: { show: true, title : "Memuat Ulang" },
              saveAsImage: { show: true, title : "Simpan Gambar" }
            }
        },
        tooltip: {
          trigger: 'item'
        },
        // legend: {
        //   orient: 'vertical',
        //   left: 'left'
        // },
        series: [
          {
            name: 'Access From',
            type: 'pie',
            radius: '50%',
            data: [
              { value: 1048, name: 'Search Engine' },
              { value: 735, name: 'Direct' },
              { value: 580, name: 'Email' },
              { value: 484, name: 'Union Ads' },
              { value: 300, name: 'Video Ads' }
            ],
            emphasis: {
              itemStyle: {
                shadowBlur: 10,
                shadowOffsetX: 0,
                shadowColor: 'rgba(0, 0, 0, 0.5)'
              }
            }
          }
        ]
      };
   
   // 使用刚指定的配置项和数据显示图表。
   myChart2.setOption(option);
}
