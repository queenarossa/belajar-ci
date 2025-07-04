<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<?php if (session()->get('diskon_nominal')): ?>
  <div class="alert alert-info text-center fw-bold">
    🎉 Hari ini ada diskon <?= 'Rp' . number_format(session()->get('diskon_nominal')) ?> per item
  </div>
<?php endif; ?>

<?php
if (session()->getFlashData('success')) {
?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= session()->getFlashData('success') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
}
?>
<?php echo form_open('keranjang/edit') ?>
<!-- Table with stripped rows -->
<table class="table datatable">
    <thead>
        <tr>
            <th scope="col">Nama</th>
            <th scope="col">Foto</th>
            <th scope="col">Harga</th>
            <th scope="col">Diskon</th>
            <th scope="col">Harga Setelah Diskon</th>
            <th scope="col">Jumlah</th>
            <th scope="col">Subtotal</th>
            <th scope="col">Aksi</th>

        </tr>
    </thead>
    <tbody>
        <?php
        $i = 1;
        if (!empty($items)) :
            foreach ($items as $index => $item) :
        ?>
                <tr>
  <td><?= $item['name'] ?></td>
  <td><img src="<?= base_url('img/' . $item['options']['foto']) ?>" width="100px"></td>
  <td><?= number_to_currency($item['options']['harga_asli'] ?? $item['price'], 'IDR') ?></td>
  <td><?= number_to_currency($item['options']['diskon'] ?? 0, 'IDR') ?></td>
  <td><?= number_to_currency($item['price'], 'IDR') ?></td>
  <td>
    <input type="number" min="1" name="qty<?= $i++ ?>" class="form-control" value="<?= $item['qty'] ?>">
  </td>
  <td><?= number_to_currency($item['subtotal'], 'IDR') ?></td>
  <td>
    <a href="<?= base_url('keranjang/delete/' . $item['rowid']) ?>" class="btn btn-danger"><i class="bi bi-trash"></i></a>
  </td>
</tr>

                </tr>
        <?php
            endforeach;
        endif;
        ?>
    </tbody>
</table>
<!-- End Table with stripped rows -->
<div class="alert alert-info">
    <?php echo "Total = " . number_to_currency($total, 'IDR') ?>
</div>

<button type="submit" class="btn btn-primary">Perbarui Keranjang</button>
<a class="btn btn-warning" href="<?php echo base_url() ?>keranjang/clear">Kosongkan Keranjang</a>
<?php if (!empty($items)) : ?>
    <a class="btn btn-success" href="<?php echo base_url() ?>checkout">Selesai Belanja</a>
<?php endif; ?>
<?php echo form_close() ?>
<?= $this->endSection() ?>