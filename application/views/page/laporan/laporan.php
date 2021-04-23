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
                            <select name="filter" id="filter" class="custom-select form-control pt-2">
                                <option value="">-- Pilih Semua --</option>
                                <option value="kelas">-- Berdasarkan Kelas --</option>
                                <option value="tanggal">-- Berdasarkan Tanggal --</option>
                                </select><br>
                            <div class="input-group pt-2" id="kelas">
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="fas fa-chalkboard"></i>
                                    </span>
                                </div>
                                <select name="id_kelas" id="id_kelas" class="custom-select form-control">
                                    <option value="">-- Pilih Kelas --</option>
                                    <?php foreach($kelas as $row) : ?>    
                                        <option value="<?= $row['id_kelas']; ?>"><?= $row['nama_kelas']; ?></option>
                                    <?php endforeach; ?>    
                                    </select><br>
                                <div class="input-group-append">
                                    <button id="cariKelas" type="button" class="btn btn-primary">Cari</button>
                                </div>
                            </div>
                            <div class="input-group pt-2" id="tanggal">
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
                <div class="laporan"></div>
            </div>
            </form>
        </div>
    </div>
</div>