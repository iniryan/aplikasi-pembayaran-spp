<div class="page-header">
    <div>
        <h1>Detail Data Siswa</h1>
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
            <div class="form-group">
                <a href="<?= base_url('siswa'); ?>" class="btn btn-outline-secondary ml-2">Kembali</a>
            </div>
        </div>
    </div>
</div>