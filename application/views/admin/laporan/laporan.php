<div class="page-header">
    <div>
        <h1>Laporan Transaksi</h1>
    </div>
</div>

<div class="row mt-3">
    <div class="col-lg">
        <div class="card">
            <form action="<?= base_url('laporan/cetak'); ?>" method="post">
            <div class="card-header">
                <div class="form-group">
                    <div class="input-group justify-content-between">
                        <div class="col-md-4 mt-2">
                            <div class="input-group">
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="far fa-calendar-alt"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control" autocomplete="off" name="tglPembayaran" id="datepick" readonly placeholder="Filter Tanggal"><br>
                                <div class="input-group-append">
                                    <button id="caripembayaran" type="button" class="btn btn-primary">Cari</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 mt-2">
                            <div class="input-group">
                                <button type="submit" class="btn btn-warning">Cetak Laporan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <div class="laporan"></div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>