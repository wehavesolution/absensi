<div class="section">
    <div class="head-title mt-4">
        <h2 class="mb-2">Rekap Absensi</h2>
        <h5 class="text-700 fw-semi-bold"><?=$sub_title;?></h5>
    </div>
    <div class="filter my-4">
        <div class="row">
            <div class="col-md-12 mb-2">
                <div class="card">
                    <div class="card-body">
                        <form action="javascript:void(0);" id="form-filter" method="post">
                            <?php
                            if ($link_api) {
                              foreach ($link_api as $k => $v) {
                                echo "<input type='hidden' id='link_".$v[0]."' value='".$v[1]."'>";
                              }
                            }
                            ?>
                            <div class="d-flex justify-content-start gap-4 pb-3"  style="overflow-x: scroll;">
                                <div class="form_filter">
                                    <div>Status</div>
                                    <div>
                                        <select name="i_status_absensi" id="i_status_absensi">
                                            <option value="">-- Pilih --</option>
                                            <option value="I">Masuk</option>
                                            <option value="O">Pulang</option>
                                            <option value="TLT">Telat</option>
                                            <option value="CTI">Cuti</option>
                                            <option value="LMB">Lembur</option>
                                            <option value="PJLDNS">Perjalanan Dinas</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form_filter">
                                    <div>Karyawan</div>
                                    <div>
                                        <select name="i_karyawan" id="i_karyawan">
                                            <option value="">-- Pilih --</option>
                                            <?php foreach ($filter['f_karyawan'] as $v) {
                                            echo "<option value='".$v->id."'>".$v->nama."</option>";
                                            } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form_filter">
                                    <div>Jabatan</div>
                                    <div>
                                        <select name="i_jabatan" id="i_jabatan">
                                            <option value="">-- Pilih --</option>
                                            <?php foreach ($filter['f_jabatan'] as $v) {
                                            echo "<option value='".$v->id."'>".$v->nma_jabatan."</option>";
                                            } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form_filter">
                                    <div>Dari Tanggal</div>
                                    <div>
                                        <input type="date"  name="i_date_start" id="i_date_start"/>
                                    </div>
                                </div>
                                <div class="form_filter">
                                    <div>Sampai Tanggal</div>
                                    <div>
                                        <input type="date"  name="i_date_end" id="i_date_end"/>
                                    </div>
                                </div>
                                <div class="form_filter position-relative" style="top: 16px;">
                                    <input type="submit" class="btn btn-secondary btn-sm" value="FILTER">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section-body">
        <div class="chart my-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="card border border-200 shadow-none">
                        <div class="card-body">
                          <div class="d-flex justify-content-between">
                            <div>
                              <h5 class="mb-1">Grafik Data</h5>
                              <h6 class="text-700">Tahun <?=date('Y')?></h6>
                            </div>
                          </div>
                          <div class="pb-0 pt-4">
                            <div id="grafik_absensi_pertahun" style="min-height:320px;width:100%"></div>
                          </div>
                        </div>
                      </div>
                </div>
            </div>
        </div>
        <div class="si-datatable mb-4">
            <div class="row">
                <div class="col-md-12">
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
                                        <td>Keterangan</td>
                                    </tr>
                                </thead>
                                <tbody style="font-size:14px;">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
