<script src="<?= base_url();?>template/assets/js/phoenix.js"></script>
<script src="<?= base_url();?>template/assets/js/ecommerce-dashboard.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/2.2.7/echarts-all.js"></script>
<script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<script src="<?= base_url();?>assets/js/global.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php

if ($js) {
    foreach ($js as $k => $v) {
        echo "<script src='".base_url($v)."'></script>";
    }
}

?>

<script>


document.addEventListener('DOMContentLoaded', function () {
  // do something here ...
  bar();
}, false);
    
function bar() { 
 // 基于准备好的dom，初始化echarts实例
 var myChart = echarts.init(document.getElementById('grafik_absensi'));

// 指定图表的配置项和数据

// const labelOption = {
//   show: true,
// //   position: app.config.position,
//   distance: app.config.distance,
//   align: app.config.align,
//   verticalAlign: app.config.verticalAlign,
//   rotate: app.config.rotate,
//   formatter: '{c}  {name|{a}}',
//   fontSize: 16,
//   rich: {
//     name: {}
//   }
// };

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
      data: ['2012', '2013', '2014', '2015', '2016']
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
</script>