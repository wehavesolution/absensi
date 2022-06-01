<style>
  .feather-16{
width: 16px;
height: 16px;
}
.feather-24{
width: 24px;
height: 24px;
}
.icon svg{
width: 24px;
height: 24px;
}
</style>



<div class="d-flex flex-center content-min-h">
<div class="pb-5">
            <div class="row g-5">
              <div class="col-12 col-xxl-6">
                <div class="mb-8">
                  <h2 class="mb-2">Dashboard</h2>
                  <h5 class="text-700 fw-semi-bold"><?=$sub_title;?></h5>
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <div class="d-flex align-items-center">
                      <div class="icon">
                        <span data-feather="clipboard"></span>
                      </div>
                      <div class="ms-3">
                        <h4 class="mb-0"><?=$data['total'];?></h4>
                        <p class="text-800 fs--1 mb-0">Total Abensi</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="d-flex align-items-center">
                    <div class="icon">
                      <span data-feather="user-check"></span> 
                    </div> 
                      <div class="ms-3">
                        <h4 class="mb-0"><?=$data['tepat_waktu'];?></h4>
                        <p class="text-800 fs--1 mb-0">Total Tepat Waktu</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="d-flex align-items-center">
                    <div class="icon">
                      <span data-feather="user-x"></span>  
                    </div>
                      <div class="ms-3">
                        <h4 class="mb-0"><?=$data['telat'];?></h4>
                        <p class="text-800 fs--1 mb-0">Total Telat</p>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-3">
                    <div class="d-flex align-items-center">
                    <div class="icon">
                      <span data-feather="user-minus"></span> 
                    </div> 
                      <div class="ms-3">
                        <h4 class="mb-0"><?=$data['cuti'];?></h4>
                        <p class="text-800 fs--1 mb-0">Total Cuti</p>
                      </div>
                    </div>
                  </div>

                </div>
                <hr class="bg-200 mb-6 mt-4">
                <div class="row flex-between-center mb-4 g-3">
                  <div class="col-auto">
                    <h3>Grafik Absensi</h3>
                    <p class="text-700 lh-sm mb-0">Update terbaru pada tanggal <u><?=tgl_indo(date('Y-m-d'))?></u></p>
                  </div>
                  <div class="col-8 col-sm-4">
                    <form action="javascript:void(0);" id="form-filter" method="post">
                      <div class="d-flex gap-2" style="align-items: baseline;">
                      <select name="tahun" class="form-select form-select-sm mt-2">
                          <?php
                            for ($i=0; $i < 10; $i++) { 
                              echo "<option value='".date('Y')+$i."'>".date('Y')+$i."</option>";
                            }
                          ?>
                      </select>
                      <button type="submit"  style="height: fit-content;">Filter</button>
                          </div>
                    </form>

                    <?php
if ($link_api) {
  foreach ($link_api as $k => $v) {
    echo "<input type='hidden' id='link_".$v[0]."' value='".$v[1]."'>";
  }
}
?>

                  </div>
                </div>
                
                
                <div class="card border border-200 shadow-none">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <div>
                        <h5 class="mb-1">Grafik Data Absensi</h5>
                        <h6 class="text-700">Tahun 2022</h6>
                      </div>
                    </div>
                    <div class="pb-0 pt-4">
                      <div id="grafik_absensi" style="min-height:320px;width:100%"></div>
                    </div>
                  </div>
                </div>

              
              </div>
              <div class="row mt-4">
                  <div class="col-12 col-md-12">
                    <div class="card border border-200 shadow-none h-100">
                      <div class="card-body">
                        <table class="table table-striped" id="table">
                          <thead>
                            <tr>
                              <td>No</td>
                              <td>Tanggal</td>
                              <td>Nama</td>
                              <td>Masuk</td>
                              <td>Pulang</td>
                              <td>Status</td>
                            </tr>
                          </thead>
                          <tbody>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
          </div>
</div>