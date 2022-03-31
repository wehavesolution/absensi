
<?php $this->load->view('incl/head');?>
  <body>
    <main class="main" id="top">
      <div class="container-fluid px-0">
        <?php $this->load->view('incl/sidebar');?>
        <?php $this->load->view('incl/navbar');?>
        <div class="content">
          <div class="d-flex flex-center content-min-h">
            <?php $this->load->view('page/'.$page);?>
        </div>
            <?php $this->load->view('incl/footer');?>
        </div>
      </div>
    </main>
    <?php $this->load->view('incl/script');?>
  </body>
</html>