<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<h4>History Transaksi Pembelian <strong><?= $username ?></strong></h4>
<hr>

<div class="table-responsive">
  <table class="table datatable">
    <thead>
      <tr>
        <th>#</th>
        <th>ID Pembelian</th>
        <th>Waktu Pembelian</th>
        <th>Total Bayar</th>
        <th>Alamat</th>
        <th>Ongkir</th>
        <th>Status</th>
        <th>Detail</th>
      </tr>
    </thead>
    <tbody>
      <?php if (!empty($buy)) : ?>
        <?php foreach ($buy as $index => $item) : ?>
          <tr>
            <td><?= $index + 1 ?></td>
            <td><?= $item['id'] ?></td>
            <td><?= $item['created_at'] ?></td>
            <td><?= number_to_currency($item['total_harga'], 'IDR') ?></td>
            <td><?= $item['alamat'] ?></td>
            <td><?= number_to_currency($item['ongkir'], 'IDR') ?></td>
            <td><?= ($item['status'] == "1") ? "Sudah Selesai" : "Belum Selesai" ?></td>
            <td>
              <button class="btn btn-success"
                      data-bs-toggle="modal"
                      data-bs-target="#detailModal"
                      onclick="loadDetail(<?= $item['id'] ?>)">
                Detail
              </button>
            </td>
          </tr>
        <?php endforeach; ?>
      <?php endif; ?>
    </tbody>
  </table>
</div>

<!-- ✅ Modal Hanya Satu -->
<div class="modal fade" id="detailModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Detail Transaksi</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
      </div>
      <div class="modal-body" id="modalDetailBody">
        <p>Memuat data transaksi...</p>
      </div>
    </div>
  </div>
</div>

<!-- ✅ Script AJAX -->
<script>
  function loadDetail(transaksiId) {
    const modalBody = document.getElementById('modalDetailBody');
    modalBody.innerHTML = 'Memuat data...';

    fetch(`<?= base_url('transaksi/detail') ?>/${transaksiId}`)
      .then(res => res.text())
      .then(html => {
        modalBody.innerHTML = html;
      })
      .catch(err => {
        modalBody.innerHTML = '<p class="text-danger">Gagal memuat detail transaksi.</p>';
        console.error(err);
      });
  }
</script>

<?= $this->endSection() ?>
