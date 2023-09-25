<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>
<?= validation_show_error('gambar'); ?>
<div class="container mt-5">
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <h3>Daftar Tambah Komik</h3>
        </div>
        <div class="card-body">
          <form action="<?= base_url('komik/save_komik'); ?>" method="post" enctype="multipart/form-data">
            <!-- csrf_filed untuk menjaga agar form nya hanya bisa diinput lewat halaman ini aja -->
            <?= csrf_field(); ?>
            <div class="mb-3 row">
              <label for="judul" class="col-sm-2 col-form-label">Judul</label>
              <div class="col-sm-10">
                <input type="text" class="form-control <?= (validation_show_error('judul') ? 'is-invalid' : ''); ?>" name="judul" value="<?= old('judul'); ?>">
                <div id="validationServer03Feedback" class="invalid-feedback">
                  <?= validation_show_error('judul'); ?>
                </div>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="Penerbit" class="col-sm-2 col-form-label">Penerbit</label>
              <div class="col-sm-10">
                <input type="text" name="penerbit" value="<?= old('penerbit'); ?>" class="form-control <?= (validation_show_error('penerbit') ? 'is-invalid'  : ''); ?>">
                <div id="validationServer03Feedback" class="invalid-feedback">
                  <?= validation_show_error('penerbit'); ?>
                </div>
              </div>
            </div>
            <div class=" mb-3 row">
              <label for="penulis" class="col-sm-2 col-form-label">Penulis</label>
              <div class="col-sm-10">
                <input type="text" name="penulis" class="form-control <?= (validation_show_error('penulis') ? 'is-invalid'  : ''); ?>" value="<?= old('penulis'); ?>">
                <div id="validationServer03Feedback" class="invalid-feedback">
                  <?= validation_show_error('penulis'); ?>
                </div>
              </div>
            </div>
            <div class="mb-3 d-flex justify-content-between align-items-center">
              <label for="gambar" class="form-label">Gambar</label>
              <div class="col-sm-10">
                <div class="col-sm-2 mb-2">
                  <img style="width :100px;height:100px; " class="img-thumbnail gambarHasil" src="<?= base_url('/images/naruto.jpg'); ?>" alt="">
                </div>
                <div class="input-group mb-3">
                  <input type="file" class="gambarUpload form-control" name="gambar" id="gambar">
                  <label class="input-group-text" for="gambar">Upload</label>
                  <div id="validationServer03Feedback" class="invalid-feedback">
                    <?php echo  validation_show_error('gambar'); ?>
                  </div>
                </div>
              </div>
            </div>
            <a class="btn btn-sm btn-warning" href="<?= base_url('/Komik'); ?>">Kembali</a>
            <button class="btn btn-sm btn-primary" type="submit">Simpan Data</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>