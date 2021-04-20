<div class="page-header">
    <div>
        <h1>Ubah Data Siswa</h1>
    </div>
</div>

<form action="<?= base_url('siswa/ubah_siswa/').$detail['nisn']; ?>" method="post">
    <div class="card mb-4 py-4 px-4">
        <div class="row">
            <div class="col-lg">
                <div class="form-group">
                    <label for="nisn">Nomor Induk Siswa Nasional (NISN)</label>
                    <input type="numeric" class="form-control" minlength="10" maxlength="10" name="nisn" id="nisn" placeholder="Masukkan NISN" value="<?= $detail['nisn']; ?>" readonly autocomplete="off" required>
                    <?= form_error('nisn', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="nis">Nomor Induk Siswa (NIS)</label>
                    <input type="numeric" class="form-control" minlength="12" maxlength="12" name="nis" id="nis" placeholder="Masukkan NIS" value="<?= $detail['nis']; ?>" readonly autocomplete="off" required>
                    <?= form_error('nis', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="nama_siswa">Nama Siswa</label>
                    <input type="text" class="form-control" name="nama_siswa" id="nama_siswa" placeholder="Masukkan Nama Siswa" value="<?= $detail['nama_siswa']; ?>" autocomplete="off" required>
                    <?= form_error('nama_siswa', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="no_telepon">Nomor Telepon</label>
                    <input type="numeric" class="form-control" minlength="12" maxlength="13" name="no_telepon" id="no_telepon" placeholder="Masukkan Nomor Telepon" value="<?= $detail['no_telepon']; ?>" autocomplete="off" required>
                    <?= form_error('no_telepon', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="col-lg">
                <div class="form-group">
                    <label for="id_kelas">Kelas</label>
                    <select name="id_kelas" id="id_kelas" class="custom-select form-control" required>
                    <option value="">-- Pilih Kelas --</option>
                    <?php foreach($kelas as $row) : ?>    
                        <option value="<?= $row['id_kelas']; ?>" <?= $row['id_kelas'] == $detail['id_kelas'] ? 'selected' : ''; ?> ><?= $row['nama_kelas']; ?></option>
                    <?php endforeach; ?>    
                    </select>
                    <?= form_error('id_kelas', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="id_spp">SPP</label>
                    <select name="id_spp" id="id_spp" class="custom-select form-control" required>
                    <option value="">-- Pilih SPP --</option>
                    <?php foreach($spp as $row) : ?>    
                        <option value="<?= $row['id_spp']; ?>" <?= $row['id_spp'] == $detail['id_spp'] ? 'selected' : ''; ?> ><?= $row['tahun'].' / Rp '.number_format($row['nominal'], 0, ',', '.'); ?></option>
                    <?php endforeach; ?>    
                    </select>
                    <?= form_error('id_spp', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" id="alamat" rows="3" class="form-control" required placeholder="Masukkan Alamat"><?= $detail['alamat']; ?></textarea>
                    <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="<?= base_url('siswa'); ?>" role="button" class="btn btn-outline-secondary ml-2">Batal</a>
                </div>
            </div>
        </div>
    </div>
</form>