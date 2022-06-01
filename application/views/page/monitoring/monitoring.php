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
                <h2 class="mb-2">Monitoring</h2>
                <h5 class="text-700 fw-semi-bold">Absensi</h5>
            </div>
        </div>
        <div class="row mt-1">
            <div class="col-md-12 mb-2">
                <div class="card">
                    <div class="card-body">
                        <form action="javascript:void(0);" id="form_filter" method="post">
                            <div class="d-flex justify-content-start gap-4 ">
                                <div class="form_filter">
                                    <div>Tanggal Mulai</div>
                                    <div>
                                        <input type="date"  name="i_date" id="i_date_start"/>
                                    </div>
                                </div>
                                <div class="form_filter">
                                    <div>Tanggal Akhir</div>
                                    <div>
                                        <input type="date"  name="i_date" id="i_date_end"/>
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
                                    <td>Total Absen</td>
                                    <td>Total Tepat Waktu</td>
                                    <td>Total Telat</td>
                                    <td>Tanggal Update</td>
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