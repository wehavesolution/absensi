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
                <h2 class="mb-2">Pengaturan</h2>
                <h5 class="text-700 fw-semi-bold">Absensi</h5>
            </div>
        </div>
        <div class="row mt-1">
            <div class="col-md-12 mb-2">
                <form action="javascript:void(0);" id="form_pengaturan" method="post">
                    <?php if($data[0]) { ?>
                    <div class="card">
                        <div class="card-body">
                            <div class="input mb-2">
                                <div>Jam Buka</div>
                                <input type="text" name="jam_buka" id="jam_buka" class="form-control" value="<?=$data[2]->jam_buka;?>">
                                <input type="hidden" name="id" id="id" class="form-control" value="<?=$data[2]->id;?>">
                            </div>
                            <div class="input mb-2">
                                <div>Jam Telat</div>
                                <input type="text" name="jam_telat" id="jam_telat" class="form-control" value="<?=$data[2]->jam_telat;?>">
                            </div>
                            <div class="input mb-2">
                                <div>Jam Pulang</div>
                                <input type="text" name="jam_pulang" id="jam_pulang" class="form-control" value="<?=$data[2]->jam_keluar;?>">
                            </div>
                            <div class="input mb-2">
                                <div>Jam Tutup</div>
                                <input type="text" name="jam_tutup" id="jam_tutup" class="form-control" value="<?=$data[2]->jam_tutup;?>">
                            </div>
                            <div class="input mt-4">
                                <input type="submit" class="btn btn-primary" value="Update Pengaturan">
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </form>
            </div>
        </div>
        
    </div>
</div>
</div>