<div class="owah">
<div class="row g-5">
        <div class="col-12 col-xxl-6">
            <div class="mb-2">
                <h2 class="mb-2">Grup Jabatan</h2>
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
                      <div class="modal fade" id="add_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Tambah Grup Jabatan</h5><button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs--1"></span></button>
                            </div>
                            <form method="post" action="javascript:void(0);" id="form_add">
                            <div class="modal-body">
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-form-name">Grup Jabatan</label>
                                        <input class="form-control" id="basic-form-name" type="text" name="nama_group" placeholder="">
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-primary" type="submit">Simpan</button>
                                <button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Cancel</button></div>
                          </div>
                          </form>

                        </div>
                      </div>
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
                            <td>Grup Jabatan</td>
                        </tr>
                    </thead>
                    <tbody style="font-size:14px;">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>