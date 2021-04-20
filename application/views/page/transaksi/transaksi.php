<div class="page-header">
    <div>
        <h1>Entri Pembayaran SPP</h1>
    </div>
</div>

<form method="post" action="<?= base_url('transaksi/proses_pembayaran'); ?>">
<div class="row">
    <div class="col-lg">
      <?= $this->session->flashdata('message'); ?>  
        <div class="card">
            <div class="card-header">
                Form Pembayaran SPP
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg">
                        <div class="form-group">
                            <label for="nisn">Nomor Induk Siswa Nasional (NISN)</label>
                            <div class="input-group">
                                <input type="numeric" class="form-control" name="nisn" id="nisn" autocomplete="off" placeholder="NISN" required readonly>
                                <span class="input-group-append">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#siswaModal">Cari</button>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nis">Nomor Induk Siswa (NIS)</label>
                            <input type="numeric" class="form-control" name="nis" id="nis" autocomplete="off" placeholder="NIS" readonly>
                        </div>
                        <div class="form-group">
                            <label for="nama_siswa">Nama Siswa</label>
                            <input type="text" class="form-control" name="nama_siswa" id="nama_siswa" autocomplete="off" placeholder="Nama Siswa" readonly>
                        </div>
                        <div class="form-group">
                            <label for="nama_kelas">Kelas</label>
                            <input type="text" class="form-control" name="nama_kelas" id="nama_kelas" autocomplete="off" placeholder="Kelas" readonly>
                        </div>
                    </div>
                    <div class="col-lg">
                        <div class="form-group">
                            <label for="tahun">Tahun Dibayar (Tahun SPP)</label>
                            <input type="hidden" class="form-control" name="id_spp" id="id_spp" autocomplete="off" placeholder="ID SPP" readonly required>
                            <input type="numeric" class="form-control" name="tahun" id="tahun" autocomplete="off" placeholder="Tahun" readonly required>
                        </div>
                        <div class="form-group">
                            <label for="bulan_dibayar">Bulan Dibayar</label>
                            <select class="form-control" name="bulan_dibayar" id="bulan_dibayar" required disabled>
                                <option value="">-Pilih Bulan-</option>
                                <option value="Januari">Januari</option>
                                <option value="Februari">Februari</option>
                                <option value="Maret">Maret</option>
                                <option value="April">April</option>
                                <option value="Mei">Mei</option>
                                <option value="Juni">Juni</option>
                                <option value="Juli">Juli</option>
                                <option value="Agustus">Agustus</option>
                                <option value="September">September</option>
                                <option value="Oktober">Oktober</option>
                                <option value="November">November</option>
                                <option value="Desember">Desember</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nominal">Jumlah Bayar</label>
                            <input type="numeric" class="form-control" name="nominal" id="nominal" autocomplete="off" placeholder="Rp " readonly required>
                        </div>
                        <div class="form-group">
                            <button onclick="return confirm('Pembayaran akan dilakukan ?')" type="submit" class="btn btn-warning my-2">Proses Pembayaran</button>
                            <button id="reset" class="btn btn-outline-secondary ml-2" type="reset">Reset Data</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</form>

<div class="row mt-3">
    <div class="col-lg">
        <div class="card">
            <div class="card-header">
                History Pembayaran SPP
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="table-transaksi" class="table table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th>Tanggal Pembayaran</th>        
                                <th>NISN</th>
                                <th>Atas Nama</th>
                                <th>SPP</th>
                                <th>Petugas</th>
                                <th>Jumlah Bayar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($datafilter as $row) { ?>
                            <tr class="text-center">
                                <td><?= date_indo($row['tgl_bayar']); ?></td>
                                <td><?= $row['nisn']; ?></td>                    
                                <td><?= $row['nama_siswa']; ?></td>                    
                                <td><?= $row['bulan_dibayar'].' - '.$row['tahun_dibayar']; ?></td>
                                <td><?= $row['nama_petugas']; ?></td>
                                <td>Rp <?= number_format($row['jumlah_bayar'], 0, ',', '.'); ?></td>
                                <td>
                                    <?php if($this->session->userdata('level') == 'Administrator') { ?>
                                        <a class="btn btn-info p-2 mt-1" href="<?= base_url('laporan/cetak_nota/') . $row['id_pembayaran']; ?>">
                                            Cetak
                                        </a>
                                    <?php } ?>
                                    <?php if($this->session->userdata('level') == 'Petugas') { ?>
                                        <a class="btn btn-info p-2 mt-1" href="<?= base_url('histori/cetak_nota/') . $row['id_pembayaran']; ?>">
                                            Cetak
                                        </a>
                                    <?php } ?>
                                    <a onclick="return confirm('Anda yakin akan membatalkan transaksi siswa ini ?')" class="btn btn-danger p-2 mt-1" href="<?= base_url('transaksi/batal/') . $row['id_pembayaran']; ?>">
                                        Batal
                                    </a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="siswaModal" tabindex="-1" role="dialog" aria-labelledby="siswaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="siswaModalLabel">Cari Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <div class="table-responsive">
                <table id="table-siswa-modal" class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th>NISN</th>
                            <th>NIS</th>
                            <th>Nama Siswa</th>
                            <th>Kelas</th>
                            <th>SPP</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $no = 1;
                    foreach ($siswa as $row) { ?>
                        <tr>
                            <td class="text-center"><?= $no++; ?></td>
                            <td><?= $row['nisn']; ?></td>
                            <td><?= $row['nis']; ?></td>             
                            <td><?= $row['nama_siswa']; ?></td>               
                            <td><?= $row['nama_kelas']; ?></td>             
                            <td><?= $row['tahun']; ?></td>
                            <td>
                                <button class="btn btn-primary p-2 mt-1" id="select"
                                    data-nisn="<?= $row['nisn']; ?>"
                                    data-nis="<?= $row['nis']; ?>"
                                    data-nama_siswa="<?= $row['nama_siswa']; ?>"
                                    data-nama_kelas="<?= $row['nama_kelas']; ?>" 
                                    data-id_spp="<?= $row['id_spp']; ?>"
                                    data-tahun="<?= $row['tahun']; ?>"
                                    data-nominal="<?= $row['nominal']; ?>"
                                >
                                    Pilih
                                </button>
                            </td>                                                                
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>
</div>