<?= $this->extend("layouts/app") ?>

<?= $this->section("body") ?>
<section class="content">

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Dokumen Calon Peserta Prakerin</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>NIS</th>
                            <th>Nama Lengkap</th>
                            <th>T.Badan</th>
                            <th>B.Badan</th>
                            <th>Formulir</th>
                            <th>Raport</th>
                            <th>Vaksin</th>
                            <th>Surat Kesehatan</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
                <?php if (!empty(session()->getFlashdata('message'))) : ?>
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <?php echo session()->getFlashdata('message'); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif ?>
                <?php if (isset($validation)) : ?>
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <strong><?= $validation->listErrors() ?></strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>
            </div>
        </div>


        <div class="card-footer">
        </div>
    </div>
</section>

<?= $this->endSection() ?>