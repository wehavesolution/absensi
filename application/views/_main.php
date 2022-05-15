
<?php $this->load->view('incl/head');?>
  <body>
    <main class="main" id="top">
      <div class="container-fluid px-0">
        <?php $this->load->view('incl/sidebar');?>
        <?php $this->load->view('incl/navbar');?>
        <div class="content">
            <?php $this->load->view('page/'.$page);?>
            <?php $this->load->view('incl/footer');?>
        </div>
      </div>
    </main>
    <?php $this->load->view('incl/script');?>

    <div class="modal fade" id="modal_absensi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    
    <div class="d-flex justify-content-center mb-4" style="position: absolute; right: 0;">
      <div class="text-center p-0" id="form-kamera"  style="cursor:pointer;width:145px;" onclick="bukaKamera()">
          Ambil Foto
      </div>
    </div>

    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Form Absensi</h5><button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><svg class="svg-inline--fa fa-times fa-w-11 fs--1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 352 512" data-fa-i2svg=""><path fill="currentColor" d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z"></path></svg><!-- <span class="fas fa-times fs--1"></span> Font Awesome fontawesome.com --></button>
        </div>
        <div class="modal-body py-4 px-4">    
          <div class="d-flex align-items-center justify-content-center">
              <h1 id="jam_realtime">00:00</h1>
          </div>
          <div class="text-center mt-2">
            <p class="text-700 lh-lg mb-0">Hi <b>Sahrul Rizal</b>, </br> <span id="text_response"><?=$info_absensi[2]?></span></p>
          </div>

          <div class="d-flex justify-content-center mt-4" id="form_absensi">
            <?php if ($info_absensi[3] == 2) { ?>
              <form action="javascript:void(0);" onsubmit="setAbsenPulang(this)" method="post">   
                    <button class="btn btn-danger" type="submit">Ya</button>
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal" aria-label="Close">Tidak</button>
                </form>                
             <?php }else if($info_absensi[3] == 1){ ?>
            <form action="javascript:void(0);" onsubmit="setAbsenMasuk(this)" method="post">
              <button class="btn btn-warning" type="submit">Absen Sekarang</button>
            </form>
            <?php }else if($info_absensi[3] == 4) { ?>
              <a href="<?=site_url('Main/absensi_pribadi')?>">
                   <button class="btn btn-secondary">Cek Absen</button>
               </a>
            <?php } ?>
          </div> 
        </div>
      </div>
    </div>
    </div>

    <div class="modal fade" id="modal_pengajuan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Form Pengajuan</h5><button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><svg class="svg-inline--fa fa-times fa-w-11 fs--1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 352 512" data-fa-i2svg=""><path fill="currentColor" d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z"></path></svg><!-- <span class="fas fa-times fs--1"></span> Font Awesome fontawesome.com --></button>
        </div>
        <form action="javascript:void(0);" id="form_pengajuan">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12 mb-3">
              <label for="pilih_pengajuan">Pilih Pengajuan</label>
              <select name="status_pengajuan" id="status_pengajuan" class="form-control form-control-sm">
                <option value="CTI">Cuti</option>
                <option value="SKT">Sakit</option>
                <option value="PJLDNS">Perjalanan Dinas</option>
                <option value="LMB">Lembur</option>
              </select>
            </div>
            <div class="col-md-6">
              <label for="tgl_mulai">Tanggal Mulai</label>
              <input type="date" name="tgl_mulai" class="form-control form-control-sm" id="tgl_mulai">
            </div>
            <div class="col-md-6">
              <label for="tgl_selesai">Tanggal Berakhir</label>
              <input type="date" name="tgl_akhir" class="form-control form-control-sm" id="tgl_akhir">
            </div>
            <div class="col-md-12 mt-2">
              <label for="keterangan">Keterangan</label>
              <textarea class="form-control form-control-sm" name="keterangan" id="keterangan" cols="30" rows="10"></textarea>
            </div>
          </div>
        </div>
        <div class="modal-footer"><button class="btn btn-info" type="submit">Ajukan</button><button class="btn btn-outline-info" type="button" data-bs-dismiss="modal">Batal</button></div>
        </form>

      </div>
    </div>
    </div>

    <div class="modal fade" id="modal_foto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ambil Foto</h5><button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><svg class="svg-inline--fa fa-times fa-w-11 fs--1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 352 512" data-fa-i2svg=""><path fill="currentColor" d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z"></path></svg><!-- <span class="fas fa-times fs--1"></span> Font Awesome fontawesome.com --></button>
        </div>
       
        <div class="modal-body">
            <div class="row">
                <div class="col-md-6">
                  <video id="video" width="100%" autoplay></video>
                </div>
                <div class="col-md-6">
                  <canvas id="canvas"></canvas>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-info" onclick="takeGambar()" type="button">Ulangi</button>
          <button class="btn btn-outline-info" type="button" data-bs-dismiss="modal">OK</button>
        </div>
      </div>
    </div>
    </div>


  </body>
</html>