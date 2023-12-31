<?= $this->extend("layouts/app") ?>

<?= $this->section("body") ?>
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="float-left">
        <a href="<?= base_url('koordinator/dokumen'); ?>" type="button" class="btn btn-warning">
          Kembali ke dokumen
        </a>
      </div>
    </div>
  </div>
  <?php if ($student->getNumRows() < 1) {
    $request = \Config\Services::request();
    $db = \Config\Database::connect();
    $db->table('c2')->insert(['id_siswa' => $request->getUri()->getSegment(3), 'nilai_c2' => 0]);
    header('location:' . $_SERVER['REQUEST_URI']);
  }
  ?>
  <?php foreach ($student->getResultObject() as $dt) : ?>
    <div class="card mt-3">
      <div class="card-header">
        <h3 class="card-title">Penilaian | Kelengkapan Data <?= $dt->name; ?></h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="card-body">
        <form class="" method="POST" action="<?= base_url('koordinator/dokumen/nilai') ?>" autocomplete="off">
          <div class="form-group row">
            <label for="nilai" class="col-sm-2 col-form-label">Kelengkapan Data</label>
            <div class="col-sm-10">
              <select name="nilai" class="form-control">
                <option value="" <?= $dt->nilai_c2 == null || $dt->nilai_c2 == 0 ? 'selected' : ''; ?>>-- Belum Diisi --</option>
                <option value="100" <?= $dt->nilai_c2 == '100' ? 'selected' : ''; ?>>Lengkap</option>
                <option value="70" <?= $dt->nilai_c2 == '70' ? 'selected' : ''; ?>>Kurang Lengkap</option>
                <option value="30" <?= $dt->nilai_c2 == '30' ? 'selected' : ''; ?>>Tidak Lengkap</option>
              </select>
            </div>
            <input type="hidden" value="<?= $dt->id_siswa; ?>" name="id_siswa">
          </div>
          <div class="form-group row">
            <button type="submit" class="btn btn-danger">Simpan Penilaian</button>
          </div>
        </form>
      </div>
    </div>
  <?php endforeach; ?>
</section>

<?= $this->endSection() ?>