<div class="page-header">
    <div>
        <h1>Pengaturan Instansi</h1>
    </div>
</div>

<div class="form-group">
    <div class="input-group">
        <div class="col-lg d-flex justify-content-start">
            <a href="<?= base_url('setting/tambah_instansi'); ?>" class="btn btn-primary">
                <span class="fas fa-plus"></span>
                    Tambah Instansi
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
                    <table id="table-instansi" class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th>Nama Instansi</th>
                                <th>Logo Instansi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $no = 1;
                            foreach ($instansi as $row) { ?>
                            <tr>
                                <td class="text-center"><?= $no++; ?></td>
                                <td><?= $row['nama_instansi']; ?></td>
                                <td class="text-center"><img src="<?= base_url('assets/img/').$row['logo']; ?>" alt="logo" width="60px"></td>             
                                <td>
                                    <?php if($row['dipakai'] != 1) { ?>
                                        <a href="<?= base_url('setting/set_instansi/') . $row['id_instansi']; ?>">
                                            <button class="btn btn-success p-2 mt-1">Gunakan</button>
                                        </a>
                                    <?php } ?>
                                    <a href="<?= base_url('setting/ubah_instansi/') . $row['id_instansi']; ?>">
                                        <button class="btn btn-info p-2 mt-1">Ubah</button>
                                    </a>
                                    <a href="<?= base_url('setting/delete_instansi/') . $row['id_instansi']; ?>">
                                        <button onclick="return confirm('Anda yakin akan menghapus instansi ini ?')" class="btn btn-danger p-2 mt-1 text-md">Hapus</button>
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

