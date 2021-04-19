<div class="page-header">
    <div>
        <h1>Tambah Data SPP</h1>
    </div>
</div>

<form method="post" action="<?= base_url('spp/tambah_spp'); ?>">
<div class="card mb-4 py-4 px-4">
    <div class="row">
        <div class="col-lg">
            <div class="form-group" data-validate = "Tahun diperlukan!!">
                <label for="tahun">Tahun</label>
                <input type="number" min="0" name="tahun" class="form-control" id="tahun" maxlength="4" autocomplete="off" placeholder="Masukkan Tahun" required>
                <?= form_error('tahun', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group" data-validate = "Nominal diperlukan">
                <label for="nominal">Nominal</label>
                <input type="number" min="0" name="nominal" class="form-control" id="nominal" autocomplete="off" placeholder="Masukkan Nominal" required>
                <?= form_error('nominal', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a class="btn btn-outline-secondary ml-2" role="button" href="<?= base_url('spp'); ?>">Batal</a>
            </div>
        </div>
    </div>
</div>
</form>
