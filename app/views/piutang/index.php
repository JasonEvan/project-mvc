<div class="container mt-3">
    <div class="row">
        <div class="col">
            <?php Flasher::flash(); ?>
        </div>
    </div>
    <div class="row">
        <div class="col">
        <form class="d-flex justify-content-end" role="search">
            <input class="form-control me-2 w-25" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table mt-3">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Pembeli</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Stock Piutang</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php 
                        $no = 1; 
                        foreach ($data["db"] as $row) :
                    ?>
                    <tr>
                        <th scope="row"><?= $no++ ?></th>
                        <td><?= $row['nama_pembeli']; ?></td>
                        <td><?= $row['nama_barang']; ?></td>
                        <td><?= $row['stok_barang_piutang']; ?></td>
                        <td><?= $row['harga']; ?></td>
                        <td>
                            <div>
                                <a href="<?= BASEURL; ?>/piutang/cicil/<?= $row['id']; ?>" class="btn btn-sm btn-info">Cicil</a>
                                <a class="btn btn-sm btn-danger" href="<?= BASEURL; ?>/piutang/hapuspiUtang/<?= $row['id']; ?>" 
                                    onclick="return confirm('Apakah yakin melunasi semua?')">Lunasi</a>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>