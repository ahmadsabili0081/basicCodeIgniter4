<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>
<div class="container mt-5">
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <h4>Form Edit Komik</h4>
        </div>
        <div class="card-body">
          <form action="<?= base_url('/komik/save_ubah/' . $komik['id_komik']); ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="slug" value="<?= $komik['slug']; ?>">
            <input type="hidden" name="gambarLama" value="<?= $komik['gambar']; ?>">
            <div class="mb-3 row">
              <label for="judul" class="col-sm-2 col-form-label">Judul</label>
              <div class="col-sm-10">
                <input type="text" class="form-control <?= (validation_show_error('judul') ? 'is-invalid'  : ''); ?>" name="judul" value="<?= (old('judul') ? old('judul') : $komik['judul']); ?>">
                <div id="validationServer03Feedback" class="invalid-feedback">
                  <?= validation_show_error('judul'); ?>
                </div>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="Penerbit" class="col-sm-2 col-form-label">Penerbit</label>
              <div class="col-sm-10">
                <input type="text" class="form-control <?= (validation_show_error('penerbit') ? 'is-invalid' : ''); ?>" name="penerbit" value="<?= (old('penerbit') ? old('penerbit') : $komik['penerbit']); ?>">
                <div id="validationServer03Feedback" class="invalid-feedback">
                  <?= validation_show_error('penerbit') ?>
                </div>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="Penulis" class="col-sm-2 col-form-label">Penulis</label>
              <div class="col-sm-10">
                <input type="text" class="form-control <?= validation_show_error('penulis') ? 'is-invalid' : ''; ?>" name=" penulis" value="<?= (old('penulis') ? old('penulis') : $komik['penulis']); ?>">
                <div id="validationServer03Feedback" class="invalid-feedback">
                  <?= validation_show_error('penulis'); ?>
                </div>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="gambar" class="form-label ">Gambar</label>
              <div class="col-sm-10 ">
                <div class="col-sm-2 mb-2">
                  <img style="width :100px;height:100px; " class="img-thumbnail gambarHasil" src="<?= base_url('/images/' . $komik['gambar']); ?>" alt="">
                </div>
                <div class="input-group mb-3">
                  <input type="file" class="gambarUpload form-control" name="gambar" id="gambar">
                  <label class="input-group-text" for="gambar"><?= $komik['gambar'] ?></label>
                  <div id=" validationServer03Feedback" class="invalid-feedback">
                    <?= validation_show_error('gambar'); ?>
                  </div>
                </div>
              </div>
            </div>
            <a class="btn btn-sm btn-warning" href="<?= base_url('/Komik'); ?>">Kembali</a>
            <button class="btn btn-sm btn-primary" type="submit">Ubah Data</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>