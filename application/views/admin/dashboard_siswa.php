<div class="page-header">
    <div>
        <h1>Data Pembayaran Siswa</h1>
    </div>
</div>
<div class="card mb-4 py-4 px-4">
    <div class="row">
        <div class="col-lg">
            <div class="form-group">
                <label for="nisn">Nomor Induk Siswa Nasional (NISN)</label>
                <input type="numeric" name="nisn" id="nisn" class="form-control" readonly disabled value="<?= $detail['nisn']; ?>">
            </div>
            <div class="form-group">
                <label for="nis">Nomor Induk Siswa (NIS)</label>
                <input type="numeric" name="nis" id="nis" class="form-control" readonly disabled value="<?= $detail['nis']; ?>">
            </div>
            <div class="form-group">
                <label for="nama_siswa">Nama Siswa</label>
                <input type="text" name="nama_siswa" id="nama_siswa" class="form-control" readonly disabled value="<?= $detail['nama_siswa']; ?>">
            </div>
            <div class="form-group">
                <label for="no_telepon">Nomor Telepon</label>
                <input type="numeric" name="no_telepon" id="no_telepon" class="form-control" readonly disabled value="<?= $detail['no_telepon']; ?>">
            </div>
        </div>
        <div class="col-lg">
            <div class="form-group">
                <label for="nama_kelas">Kelas</label>
                <input type="text" name="nama_kelas" id="nama_kelas" class="form-control" readonly disabled value="<?= $detail['nama_kelas']; ?>">
            </div>
            <div class="form-group">
                <label for="tahun">SPP (Tahun)</label>
                <input type="numeric" name="tahun" id="tahun" class="form-control" readonly disabled value="<?= $detail['tahun']; ?>">
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea name="alamat" id="alamat" readonly disabled class="form-control" rows="3"><?= $detail['alamat']; ?></textarea>
            </div>
        </div>
    </div>
</div>
<div class="row mt-3">
    <div class="col-lg">
        <div class="card">
            <div class="card-header">
                History Pembayaran SPP
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="table-histori-siswa" class="table table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th>Tanggal Pembayaran</th>        
                                <th>SPP</th>
                                <th>Petugas</th>
                                <th>Jumlah Bayar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($datafilter as $row) { ?>
                            <tr class="text-center">
                                <td><?= date_indo($row['tgl_bayar']); ?></td>
                                <td><?= $row['bulan_dibayar'].' - '.$row['tahun_dibayar']; ?></td>
                                <td><?= $row['nama_petugas']; ?></td>
                                <td>Rp <?= number_format($row['jumlah_bayar'], 0, ',', '.'); ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>