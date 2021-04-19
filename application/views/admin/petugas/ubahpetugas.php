<div class="page-header">
    <div>
        <h1>Ubah Data Petugas</h1>
    </div>
</div>


<form method="post" action="<?= base_url('petugas/ubah_petugas/').$detail['id_petugas']; ?>">
<div class="card mb-4 py-4 px-4">
    <div class="row">

    <input type="hidden" class="form-control" id="id_petugas" name="id_petugas" required value="<?= $detail['id_petugas']?>">

        <div class="col-lg">
            <div class="form-group">
                <label for="nama_petugas">Nama Petugas</label>
                <input type="text" name="nama_petugas" class="form-control" id="nama_petugas" autocomplete="off" value="<?= $detail['nama_petugas']; ?>"  placeholder="Masukkan Nama Petugas" required>
                <?= form_error('nama_petugas', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control" id="username" autocomplete="off" value="<?= $detail['username']; ?>"  placeholder="Masukkan Username" required>
                <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>

            <div class="form-group">
                <label for="password">Password (Jika tidak diganti kosongkan saja)</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Masukkan Password" autocomplete="off">
                <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>  
            <div class="form-group">
                <label for="password_confirm">Konfirmasi Password (Jika tidak diganti kosongkan saja)</label>
                <input type="password" name="password_confirm" class="form-control" id="password_confirm" placeholder="Masukkan Konfirmasi Password" autocomplete="off">
                <?= form_error('password_confirm', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a class="btn btn-outline-secondary ml-2" role="button" href="<?= base_url('petugas'); ?>">Batal</a>
            </div>
        </div>
    </div>
</div>
</form>