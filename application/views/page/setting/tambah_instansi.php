<div class="page-header">
    <div>
        <h1>Tambah Data Intansi</h1>
    </div>
</div>

<?= form_open_multipart('setting/tambah_instansi'); ?>
<div class="card mb-4 py-4 px-4">
    <div class="row">
        <div class="col-lg">
            <div class="form-group">
                <label for="nama_instansi">Nama Instansi</label>
                <input type="text" name="nama_instansi" class="form-control" id="nama_instansi" autocomplete="off" placeholder="Masukkan Nama Instansi" required>
                <?= form_error('nama_instansi', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label for="alias">Alias</label>
                <input type="text" name="alias" class="form-control" id="alias" autocomplete="off" placeholder="Masukkan Alias" required>
                <?= form_error('alias', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label for="logo">Logo Instansi</label>
                <input type="file" name="logo" class="form-control" id="logo" autocomplete="off" placeholder="Masukkan logo" required>
            </div>
            <div class="form-group">
                <label for="provinsi">Provinsi</label>
                <input type="text" name="provinsi" class="form-control" id="provinsi" autocomplete="off" placeholder="Masukkan Provinsi" required>
                <?= form_error('provinsi', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label for="website">Website</label>
                <input type="url" name="website" class="form-control" id="website" autocomplete="off" placeholder="Masukkan Website" required>
                <?= form_error('website', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" id="email" autocomplete="off" placeholder="Masukkan Email" required>
                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea name="alamat" id="alamat" rows="3" class="form-control" required placeholder="Masukkan Alamat"></textarea>
                <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a class="btn btn-outline-secondary ml-2" role="button" href="<?= base_url('setting'); ?>">Batal</a>
            </div>
        </div>
    </div>
</div>
<?php form_close(); ?>
