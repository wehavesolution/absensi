
    <div class="row">
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                        <div class="card-body">
                            <form action="javascript:void(0);" id="form_filter" method="post">
                                <div class="d-flex justify-content-start gap-4 ">
                                    <div class="form_filter">
                                        <div>Kategori</div>
                                        <div>
                                            <select name="i_status" id="i_status">
                                                <option value="">-- Pilih --</option>
                                                <option value="TLT">Telat</option>
                                                <option value="CTI">Cuti</option>
                                                <option value="LMB">Lembur</option>
                                                <option value="PJLDNS">Perjalanan Dinas</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form_filter">
                                        <div>Status Pengajuan</div>
                                        <div>
                                            <select name="i_diterima" id="i_diterima">
                                                <option value="">-- Pilih --</option>
                                                <option value="0">Ditolak</option>
                                                <option value="1">Diterima</option>
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
            </div>
            <div class="col-12 col-md-12">
                <div class="card border border-200 shadow-none h-100">
                    <div class="card-body">
                        <table class="table table-striped" id="table">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>Tanggal</td>
                                    <td>Jam</td>
                                    <td>Nama</td>
                                    <td>Keterangan</td>
                                    <td>Kategori</td>
                                    <td>Status Pengajuan</td>
                                    <td>Aksi</td>
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