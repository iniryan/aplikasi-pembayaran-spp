<div class="page-header">
    <div>
        <h1>Ubah Data Kelas</h1>
    </div>
</div>

<form method="post" action="<?= base_url('kelas/ubah_kelas/').$detail['id_kelas']; ?>">
<div class="card mb-4 py-4 px-4">
    <div class="row">

    <input type="hidden" class="form-control" id="id_kelas" name="id_kelas" required value="<?= $detail['id_kelas']?>">

        <div class="col-lg">
            <div class="form-group">
                <label for="nama_kelas">Nama Kelas</label>
                <input type="text" name="nama_kelas" class="form-control" id="nama_kelas" autocomplete="off" placeholder="Masukkan Nama Kelas" value="<?= $detail['nama_kelas']; ?>" required>
                <?= form_error('nama_kelas', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label for="kompetensi_keahlian">Kompetensi Keahlian</label>
                <input type="text" name="kompetensi_keahlian" class="form-control" id="kompetensi_keahlian" autocomplete="off" placeholder="Masukkan Kompetensi Keahlian" value="<?= $detail['kompetensi_keahlian']; ?>" required>
                <?= form_error('kompetensi_keahlian', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a class="btn btn-outline-secondary ml-2" role="button" href="<?= base_url('kelas'); ?>">Batal</a>
            </div>
        </div>
    </div>
</div>
</form>
