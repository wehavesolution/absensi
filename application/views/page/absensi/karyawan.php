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
            <div class="mb-4">
                <h2 class="mb-2">Absensi</h2>
                <h5 class="text-700 fw-semi-bold">Karyawan</h5>
            </div>
        </div>
        <div class="row mt-1">
            <div class="col-md-12 mb-2">
                <div class="card">
                    <div class="card-body">
                        <form action="javascript:void(0);" id="form_filter" method="post">
                            <div class="d-flex justify-content-start gap-4 ">
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
                                    <div>Tanggal</div>
                                    <div>
                                        <input type="date"  name="i_date" id="i_date"/>
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