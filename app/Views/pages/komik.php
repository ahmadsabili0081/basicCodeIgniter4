<?= $this->extend('layouts/template'); ?>


<?= $this->section('content'); ?>
<style>
  .table>tbody>tr>* {
    vertical-align: middle;
  }
</style>
<div class="container mt-5">
  <div class="row">
    <div class="col">
      <a class="btn btn-sm btn-primary mb-4" href="<?= base_url('/komik/create_komik'); ?>">Tambah Data Komik</a>
      <div class="card">
        <div class="card-header">
          <h3 class="mt-2">Daftar Komik </h3>
        </div>
        <?php if (session()->getFlashdata('pesan')) : ?>
          <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
            <strong>Selamat!</strong> <?= session()->getFlashdata('pesan'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php endif; ?>
        <div class="card-body">
          <table class="table table-hover">
            <thead>
              <th class="text-center">No</th>
              <th class="text-center">Judul Komik</th>
              <th class="text-center">Gambar</th>
              <th class="text-center">Aksi</th>
            </thead>
            <tbody>
              <?php $no = 1; ?>
              <?php foreach ($komik as $k) : ?>
                <tr>
                  <td class="text-center"><?= $no++; ?></td>
                  <td class="text-center"><?= $k['judul']; ?></td>
                  <td class="text-center"><img style="width : 150px; height:150px;" class="img-thumbnail" src="<?= base_url('/images/' . $k['gambar']); ?>" alt=""></td>
                  <td class="text-center">
                    <a class="btn btn-sm btn-success" href="<?= base_url('/komik/' . $k['slug']); ?>">Detail</a>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>