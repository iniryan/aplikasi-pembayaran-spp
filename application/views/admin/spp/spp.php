<div class="page-header">
    <div>
        <h1>Data SPP</h1>
    </div>
</div>

<div class="form-group">
    <div class="input-group">
        <div class="col-lg d-flex justify-content-start">
            <a href="<?= base_url('spp/tambah_spp'); ?>" class="btn btn-primary">
                <span class="fas fa-plus"></span>
                    Tambah SPP
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
                    <table id="table-spp" class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th>Tahun</th>
                                <th>Nominal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $no = 1;
                            foreach ($spp as $row) { ?>
                            <tr>
                                <td class="text-center"><?= $no++; ?></td>
                                <td><?= $row['tahun']; ?></td>
                                <td>Rp <?= number_format($row['nominal'], 0, ',', '.') ?></td>             
                                <td>
                                    <a href="<?= base_url('spp/ubah_spp/') . $row['id_spp']; ?>">
                                        <button class="btn btn-info p-2 mt-1">Ubah</button>
                                    </a>
                                    <a href="<?= base_url('spp/delete_spp/') . $row['id_spp']; ?>">
                                        <button onclick="return confirm('Anda yakin akan menghapus data SPP ini ?')" class="btn btn-danger p-2 mt-1 text-md">Hapus</button>
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

