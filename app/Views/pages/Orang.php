<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
  <div class="row">
    <div class="col">
      <a class="btn btn-sm btn-primary mb-4 mt-4" href="<?= base_url('/komik/create_komik'); ?>">Tambah Data Orang</a>
      <div class="col-sm-4">
        <form action="/Komik/Orang" method="get">
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="keywords" placeholder="Search Your Name..." aria-label="Search Your Name..." aria-describedby="button-addon2">
            <button class="btn btn-outline-primary" type="submit">Button</button>
          </div>
        </form>
      </div>
      <div class="card">
        <div class="card-header">
          <h3 class="mt-2">Daftar Orang </h3>
        </div>
        <div class="card-body">
          <table class="table table-hover">
            <thead>
              <th class="text-center">No</th>
              <th class="text-center">Nama</th>
              <th class="text-center">Alamat</th>
              <th class="text-center">Aksi</th>
            </thead>
            <tbody>
              <?php $no = 1 + (6 * ($currentPage - 1)); ?>
              <?php foreach ($orang as $o) : ?>
                <tr>
                  <td class="text-center"><?= $no++; ?></td>
                  <td class="text-center"><?= $o['nama_orang']; ?></td>
                  <td class="text-center"><?= $o['alamat']; ?></td>
                  <td class="text-center">
                    <a href="" class="btn btn-sm btn-success">Detail</a>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
          <?= $pager->links('tb_orang', 'orang_pagination'); ?>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection('content'); ?>