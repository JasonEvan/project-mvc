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
                    <th scope="col">Nama Supplier</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Stock Utang</th>
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
                        <td><?= $row['nama_supplier']; ?></td>
                        <td><?= $row['nama_barang']; ?></td>
                        <td><?= $row['stok_barang_utang']; ?></td>
                        <td><?= $row['harga']; ?></td>
                        <td>
                            <div>
                                <button class="btn btn-sm btn-info button-trigger-utangModal" data-bs-toggle="modal" data-bs-target="#cicilBarang" 
                                data-id="<?= $row['id']; ?>">Cicil</button>
                                <a class="btn btn-sm btn-danger" href="<?= BASEURL; ?>/utang/hapusUtang/<?= $row['id']; ?>" 
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

<!-- Modal Utang -->
<div class="modal fade" id="cicilBarang" tabindex="-1" aria-labelledby="judulUtang" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="judulUtang">Cicil Utang</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= BASEURL; ?>/utang/cicil" method="post">
            <input type="hidden" id="utang_id" name="utang_id">
            <div class="mb-3">
                <label for="nama_supplier" class="form-label">Nama Supplier</label>
                <input type="text" class="form-control" id="nama_supplier" aria-describedby="nama_supplier" name="nama_supplier" readonly>
            </div>
            <div class="mb-3">
                <label for="nama_barang_utang" class="form-label">Nama Barang</label>
                <input type="text" class="form-control" id="nama_barang_utang" aria-describedby="nama_barang_utang" name="nama_barang_utang" readonly>
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Total Harga</label>
                <input type="number" class="form-control" id="harga_utang" name="harga_tambah" readonly>
            </div>
            <div class="mb-3">
                <label for="stok_barang_utang" class="form-label">Stock Utang</label>
                <input type="number" class="form-control" id="stok_barang_utang" name="stok_barang_utang">
                <div id="utangHelp" class="form-text"></div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>