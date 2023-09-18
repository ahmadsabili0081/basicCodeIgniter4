<?= $this->extend('layouts/template'); ?>


<?= $this->section('content'); ?>
<div class="container mt-2">
  <div class="row">
    <div class="col p-2">
      <div class="card  mb-3">
        <div class="row g-0">
          <div class="col-md-4">
            <img style="width: 350px; height:350px" clas src="<?= base_url('/images/' . $komik['gambar']); ?>" class="img-thumbnail rounded-start" alt="...">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title"><?= $komik['judul']; ?></h5>
              <p class="card-text">Penulis : <?= $komik['penulis']; ?></p>
              <p class="card-text">Penerbit : <?= $komik['penerbit']; ?></p>
              <div class="col">
                <a class="btn btn-sm btn-warning" href="<?= base_url('komik/Edit_Komik/' . $komik['slug']); ?>">Edit</a>
                <form action="<?= base_url('/komik/delete_komik/' . $komik['id_komik']); ?>" method="post" class="d-inline">
                  <?= csrf_field(); ?>
                  <input type="hidden" name="_method" value="delete">
                  <button class="btn btn-sm  btn-danger" type="submit" onclick="return confirm('Apakah Anda Yakin?')">Delete</button>
                </form>

              </div>
              <br>
              <br>
              <br>
              <br>
              <br>
              <br>
              <a class="btn btn-sm btn-primary" href="<?= base_url('/Komik') ?>">Kembali Ke Hamalan</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>