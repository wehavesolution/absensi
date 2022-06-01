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


// document.addEventListener('DOMContentLoaded', function () {
//   // do something here ...
// }, false);
    

</script>