<h1>Data Produk</h1>

<table border="1" width="100%" cellpadding="5">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Harga</th>
        <th>Jumlah</th>
        <th>Foto</th>
    </tr>

    <?php foreach ($product as $index => $produk): ?>
        <tr>
            <td><?= $index + 1 ?></td>
            <td><?= $produk['nama'] ?></td>
            <td><?= "Rp " . number_format($produk['harga'], 2, ',', '.') ?></td>
            <td><?= $produk['jumlah'] ?></td>
            <td>
                <?php
                    $path = FCPATH . 'img/' . $produk['foto'];
                    if (file_exists($path)) {
                        $type = pathinfo($path, PATHINFO_EXTENSION);
                        $data = file_get_contents($path);
                        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                        echo '<img src="' . $base64 . '" width="50px">';
                    } else {
                        echo 'Gambar tidak ditemukan';
                    }
                ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<p style="margin-top:20px;">Dicetak pada <?= date('d-m-Y H:i:s') ?></p>
