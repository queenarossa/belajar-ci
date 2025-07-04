<?php if ($transaksi): ?>
  <p><strong>ID Transaksi:</strong> <?= $transaksi['id'] ?></p>
  <p><strong>Tanggal:</strong> <?= $transaksi['created_at'] ?></p>
  <p><strong>Alamat:</strong> <?= $transaksi['alamat'] ?></p>
  <p><strong>Ongkir:</strong> <?= number_to_currency($transaksi['ongkir'], 'IDR') ?></p>
  <hr>

  <?php if (!empty($details)): ?>
    <ul>
      <?php 
        $diskon = session()->get('diskon_nominal') ?? 0;
        foreach ($details as $item): 
            $hargaPerItem = $item['subtotal_harga'] / $item['jumlah'];
            $hargaSetelahDiskon = max(0, $hargaPerItem - $diskon);
            $totalSetelahDiskon = $hargaSetelahDiskon * $item['jumlah'];
      ?>
        <li>
          <?= $item['jumlah'] ?>x <strong><?= esc($item['nama']) ?></strong><br>
          <?= number_to_currency($hargaPerItem, 'IDR') ?><br>
          Setelah diskon: <?= number_to_currency($hargaSetelahDiskon, 'IDR') ?><br>
          <?php if (!empty($item['foto']) && file_exists(FCPATH . 'img/' . $item['foto'])): ?>
            <br><img src="<?= base_url('img/' . $item['foto']) ?>" width="100">
          <?php endif; ?>
        </li>
        <hr>
      <?php endforeach; ?>
    </ul>
  <?php else: ?>
    <p><em>Tidak ada detail produk dalam transaksi ini.</em></p>
  <?php endif; ?>
<?php else: ?>
  <p><em>Transaksi tidak ditemukan.</em></p>
<?php endif; ?>
