<div class="container mt-3">

    <div class="row">
        <div class="col">
            <?php Flasher::flash(); ?>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahData">
                Tambah Stock
            </button>
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
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Stock</th>
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
                        <td><?= $row['nama_barang']; ?></td>
                        <td><?= $row['stok_barang']; ?></td>
                        <td><?= $row['harga']; ?></td>
                        <td>
                            <a href="<?= BASEURL; ?>/stock/jual/<?= $row["id"]; ?>" class="btn btn-sm btn-info">Jual</a>
                            <a href="<?= BASEURL; ?>/stock/delete/<?= $row["id"]; ?>" class="btn btn-sm btn-danger">Delete</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="tambahData" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="judulModal">Tambah Data</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= BASEURL ?>/stock/tambah" method="post">
            <div class="mb-3">
                <label for="nama_barang" class="form-label">Nama Barang</label>
                <input type="text" class="form-control" id="nama_barang" aria-describedby="nama_barang" name="nama_barang_tambah">
            </div>
            <div class="mb-3">
                <label for="stok_barang" class="form-label">Stock</label>
                <input type="number" class="form-control" id="stok_barang" name="stok_barang_tambah">
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="number" class="form-control" id="harga" name="harga_tambah">
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="utang">
                <label class="form-check-label" for="utang">Utang Barang</label>
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