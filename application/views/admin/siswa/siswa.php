<div class="page-header">
    <div>
        <h1>Data Siswa</h1>
    </div>
</div>

<div class="form-group">
    <div class="input-group">
        <div class="col-lg d-flex justify-content-start">
            <a href="<?= base_url('siswa/tambah_siswa'); ?>" class="btn btn-primary">
                <span class="fas fa-plus"></span>
                    Tambah Siswa
            </a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg">
      <?= $this->session->flashdata('message'); ?>  
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="table-siswa" class="table table-bordered">
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
                                    <a href="<?= base_url('siswa/detail_siswa/') . $row['nisn']; ?>">
                                        <button class="btn btn-secondary p-2 mt-1">Detail</button>
                                    </a>
                                    <a href="<?= base_url('siswa/ubah_siswa/') . $row['nisn']; ?>">
                                        <button class="btn btn-info p-2 mt-1">Ubah</button>
                                    </a>
                                    <a href="<?= base_url('siswa/delete_siswa/') . $row['nisn']; ?>">
                                        <button onclick="return confirm('Anda yakin akan menghapus siswa ini ?')" class="btn btn-danger p-2 mt-1 text-md">Hapus</button>
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

