
<div class="row mb-4">
    <div class="row mt-4">
        <!-- <div class="d-flex  justify-content-end mb-4">
            <button class="btn btn-warning" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Absen</button>
        </div> -->
        <div class="col-12 col-md-12">
            <div class="card border border-200 shadow-none h-100">
                <div class="card-header"><h4>Detail Pengajuan <?=$data->ket_pengajuan?></h4></div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="hidden" id="id_ctdby" value="<?=$data->karyawan_id?>">
                            <input type="hidden" id="id_pengajuan_id" value="<?=$data->id?>">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="tgl_mulai">Dibuat Oleh</label>
                                    <div class="form-control form-control-sm mb-3"><?=$data->nama;?></div>
                                </div>
                                <div class="col-md-6">
                                    <label for="tgl_mulai">Tanggal Dibuat</label>
                                    <div class="form-control form-control-sm mb-3"><?=$data->ctddate;?></div>
                                </div>
                                <?php if($data->status_pengajuan != "SKT") { ?>
                                <div class="col-md-6">
                                    <label for="tgl_mulai">Tanggal Mulai</label>
                                    <div class="form-control form-control-sm"><?=$data->tgl_mulai;?></div>
                                </div>
                                <div class="col-md-6">
                                    <label for="tgl_selesai">Tanggal Berakhir</label>
                                    <div class="form-control form-control-sm"><?=$data->tgl_akhir;?></div>
                                </div>
                                <?php } ?>

                                <div class="col-md-12 mt-2">
                                    <label for="keterangan">Keterangan</label>
                                    <div class="form-control form-control-sm"><?=$data->keterangan;?></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div><b>Akitivitas Pengajuan</b></div>
                            <table class="table w-100" id="table">
                                <tbody style="font-size:14px;">
                                <?php if ($log_data) { foreach ($log_data as $v) { ?>
                                    <tr>
                                        <td>
                                            <!-- <u>23 Agustus 2021 10:00 WIB</u><br> -->
                                            <?=$v['msg'];?>
                                        </td>
                                    </tr>
                                <?php } }else{ ?>
                                    <tr>
                                        <td class="text-center">Tidak ditemukan aktivitas</td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                </div>
                <div class="card-footer">
                    <?php if($this->session->userdata('id') != $data->karyawan_id && $data->diterima == "0") { ?>
                        <?php if(($this->session->userdata('id') != $data->karyawan_id)) { ?>
                            <button type="submit" class="btn btn-primary" onclick="tindaklanjuti(1)">Terima</button>
                        <?php } ?>
                        <?php if(($this->session->userdata('id') != $data->karyawan_id)) { ?>
                        <button type="button" class="btn btn-secondary" onclick="tindaklanjuti(2)">Tolak</button>
                        <?php } ?>
                    <?php }else if($this->session->userdata('id') == $data->karyawan_id && $data->diterima == "0") { ?>
                    <button type="button" class="btn btn-secondary" onclick="tindaklanjuti(3)">Batalkan Pengajuan</button>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    
</div>