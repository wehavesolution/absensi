<div class="owah">
    <div class="row g-5">
        <div class="col-12 col-xxl-6">
            <div class="mb-2">
                <h2 class="mb-2">Users</h2>
                <h5 class="text-700 fw-semi-bold">Management</h5>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-start gap-4 ">
                        <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#add_modal">Tambah</button>
                        <form action="javascript:void(0);" method="post" id="form_reset_cuti">
                            <button class="btn btn-secondary" type="submit">Reset Jatah Cuti</button>
                        </form>
                    </div>
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
                            <td>NIP</td>
                            <td>Nama</td>
                            <td>Grup</td>
                            <td>Jabatan</td>
                            <td>Jatah Cuti</td>
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

<div class="modal fade" id="ganti_pw_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ganti Password <span style="font-size:14px;" id="val_name"></span></h5><button class="btn p-1" type="button"
                    data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs--1"></span></button>
            </div>
            <form method="post" action="javascript:void(0);" id="form_ganti_pw">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label" for="basic-form-name">Password</label>
                        <input class="form-control" id="basic-form-name" type="password" name="password" placeholder="">
                        <input class="form-control"  type="hidden" id="users_id" name="users_id" placeholder="">
                    </div>
                </div>
                <div class="modal-footer">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="add_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Users</h5><button
                    class="btn p-1" type="button" data-bs-dismiss="modal"
                    aria-label="Close"><span class="fas fa-times fs--1"></span></button>
            </div>
            <form method="post" action="javascript:void(0);" id="form_add">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label" for="basic-form-name">Nama</label>
                        <input class="form-control" id="basic-form-name" type="text" name="nama"
                            placeholder="">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-form-name">Jabatan</label>
                        <select class="form-control" name="jabatan_id" id="jabatan_id">
                            <option value="">-</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-form-name">Tanggal Masuk
                            Kerja</label>
                        <input class="form-control" id="basic-form-name" type="date"
                            name="tgl_masuk" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-form-name">Tanggal Lahir</label>
                        <input class="form-control" id="basic-form-name" type="date"
                            name="tgl_lahir" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-form-name">Email</label>
                        <input class="form-control" id="basic-form-name" type="text"
                            name="email" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-form-name">NIP</label>
                        <input class="form-control" id="basic-form-name" type="text" name="nip"
                            placeholder="">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-form-name">Password</label>
                        <input class="form-control" id="basic-form-name" type="password"
                            name="password" placeholder="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="submit">Simpan</button>
                    <button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>