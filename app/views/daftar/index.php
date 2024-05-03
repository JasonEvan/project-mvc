<div class="container mt-3">
    <div class="row">
        <div class="col">
            <h3>Tambah Daftar Stock</h3>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <form action="<?= BASEURL ?>/daftar/tambahstock" method="post">
                <div class="mb-3">
                    <label for="nama_barang" class="form-label">Nama Barang</label>
                    <input type="text" class="form-control" id="nama_barang" aria-describedby="nama_barang" name="nama_barang" required>
                </div>
                <div class="mb-3">
                    <label for="harga_beli" class="form-label">Harga Beli</label>
                    <div class="input-group">
                        <span class="input-group-text">Rp.</span>
                        <input type="number" class="form-control" id="harga_beli" name="harga_beli" required>
                        <span class="input-group-text">,-</span>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="harga_jual" class="form-label">Harga Jual</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Rp.</span>
                        <input type="number" class="form-control" id="harga_jual" name="harga_jual" required>
                        <span class="input-group-text">,-</span>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="stok_barang" class="form-label">Stock Awal</label>
                    <input type="number" class="form-control" id="stok_barang" name="stok_awal" required>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
