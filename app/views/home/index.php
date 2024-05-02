<div class="container mt-3">
    <div class="row">
        <div class="col">
            <?php Flasher::flash(); ?>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h3>10 Stock Terbanyak Saat Ini</h3>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table mt-3">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Harga</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php 
                        $no = 1; 
                        foreach ($data["db"] as $row) :
                    ?>
                    <tr>
                        <th scope="row"><?= $no++ ?></th>
                        <td><?= $row['nama_barang']; ?></td>
                        <td><?= $row['stok_barang']; ?></td>
                        <td><?= $row['harga']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>