<div class="page-header">
    <div>
        <h1>Data Petugas</h1>
    </div>
</div>

<div class="form-group">
    <div class="input-group">
        <div class="col-lg d-flex justify-content-start">
            <a href="<?= base_url('petugas/tambah_petugas'); ?>" class="btn btn-primary">
                <span class="fas fa-plus"></span>
                    Tambah Petugas
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
                    <table id="table-petugas" class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th>Nama Petugas</th>
                                <th>Username</th>
                                <th>Level</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                             foreach ($petugas as $row) { ?>
                                <tr>
                                    <td class="text-center"><?= $no++; ?></td>
                                    <td class="text-capitalize"><?= $row['nama_petugas']; ?></td>
                                    <td><?= $row['username']; ?></td>
                                    <td><?= $row['level']; ?></td>
                                    <td><?php $status = $row['status'];
                                        if ($status == 1) echo "<div class='text-md'>Aktif</div>";
                                        else echo "<div class='text-md'>Diblokir</div>"; ?></td>                
                                    <td><?php if ($row['level'] != 'Administrator') { ?>
                                        <?php if ($status != 0 ) { ?>
                                            <a href="<?= base_url('petugas/block_petugas/') . $row['id_petugas']; ?>">
                                                <button onclick="return confirm('Anda yakin akan mem-block akun ini ?')" class="btn btn-warning p-2 mt-1 text-md text-white">Block</button>
                                            </a>
                                        <?php } else { ?>
                                            <a href="<?= base_url('petugas/active_petugas/') . $row['id_petugas']; ?>">
                                                <button onclick="return confirm('Anda yakin akan meng-aktifkan akun ini ?')" class="btn btn-primary p-2 mt-1 text-md">Aktifkan</button>
                                            </a>
                                        <?php }} ?>
                                            <a href="<?= base_url('petugas/ubah_petugas/') . $row['id_petugas']; ?>">
                                                <button class="btn btn-info p-2 mt-1">Ubah</button>
                                            </a>
                                        <?php if ($row['level'] != 'Administrator') { ?>
                                            <a href="<?= base_url('petugas/delete_petugas/') . $row['id_petugas']; ?>">
                                                <button onclick="return confirm('Anda yakin akan menghapus akun ini ?')" class="btn btn-danger p-2 mt-1 text-md">Hapus</button>
                                            </a>
                                    </td>                                                                
                                </tr>
                                <?php 
                            }} ?>
                        </tbody>
                    </table>
                </div>
            </div>        
        </div>
    </div>
</div>

