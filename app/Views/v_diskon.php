<?php
  use App\Models\DiskonModel;
  $diskonModel = new DiskonModel();
  $diskonHariIni = $diskonModel->where('tanggal', date('Y-m-d'))->first();
?>

<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="container mt-5">
  <h3>Manajemen Diskon</h3>

  <?php if ($diskonHariIni): ?>
    <div class="alert alert-info text-center fw-bold">
      🎉 Hari ini ada diskon <?= 'Rp' . number_format($diskonHariIni['nominal']) ?> per item
    </div>
  <?php endif; ?>

  <?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
  <?php endif; ?>

  <?php if (session()->get('validation')): ?>
    <div class="alert alert-danger">
      <?= session('validation')->listErrors() ?>
    </div>
  <?php endif; ?>

  <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalTambahDiskon">Tambah Diskon</button>

  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Tanggal</th>
        <th>Nominal</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($diskon as $d): ?>
        <tr>
          <td><?= $d['tanggal'] ?></td>
          <td>Rp<?= number_format($d['nominal']) ?></td>
          <td>
            <button type="button"
                    class="btn btn-warning btn-sm btnEditDiskon"
                    data-id="<?= $d['id'] ?>"
                    data-tanggal="<?= $d['tanggal'] ?>"
                    data-nominal="<?= $d['nominal'] ?>"
                    data-bs-toggle="modal"
                    data-bs-target="#modalEditDiskon">
              Edit
            </button>
            <a href="<?= base_url('diskon/delete/' . $d['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
          </td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</div>

<!-- Modal Tambah Diskon -->
<div class="modal fade" id="modalTambahDiskon" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="post" action="<?= base_url('diskon/store') ?>">
      <?= csrf_field() ?>
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalTambahLabel">Tambah Diskon</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" name="tanggal" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="nominal" class="form-label">Nominal</label>
            <input type="number" name="nominal" class="form-control" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Simpan</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        </div>
      </div>
    </form>
  </div>
</div>

<!-- Modal Edit Diskon -->
<div class="modal fade" id="modalEditDiskon" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="post" id="formEditDiskon">
      <?= csrf_field() ?>
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalEditLabel">Edit Diskon</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Tanggal</label>
            <input type="date" name="tanggal" id="editTanggal" class="form-control" readonly>
          </div>
          <div class="mb-3">
            <label class="form-label">Nominal</label>
            <input type="number" name="nominal" id="editNominal" class="form-control" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Update</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        </div>
      </div>
    </form>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
  const editButtons = document.querySelectorAll('.btnEditDiskon');

  editButtons.forEach(button => {
    button.addEventListener('click', function () {
      const id = this.dataset.id;
      const tanggal = this.dataset.tanggal;
      const nominal = this.dataset.nominal;

      document.getElementById('editTanggal').value = tanggal;
      document.getElementById('editNominal').value = nominal;
      document.getElementById('formEditDiskon').action = `/diskon/update/${id}`;
    });
  });
});
</script>

<?= $this->endSection() ?>
