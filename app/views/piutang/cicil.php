<div class="container mt-3">
    <div class="row">
        <div class="col">
            <h3>Masukkan piutang yang dilunasi</h3>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <form action="<?= BASEURL; ?>/piutang/cicilSedikit" method="post">
                <input type="hidden" value="<?= $data['db']['id']; ?>" name="piutang_id">
                <div class="form-floating mb-3">
                    <input disabled type="text" class="form-control" id="nama_pembeli" placeholder="nama pembeli" value="<?= $data['db']['nama_pembeli']; ?>">
                    <label for="nama_pembeli">Input nama pembeli</label>
                </div>
                <div class="form-floating mb-3">
                    <input disabled type="text" class="form-control" id="nama_barang" placeholder="nama barang" value="<?= $data['db']['nama_barang']; ?>">
                    <label for="nama_barang">Input nama barang</label>
                </div>
                <div class="form-floating mb-3">
                    <input readonly type="number" class="form-control" id="harga_barang_piutang" placeholder="harga barang" data-hargapiutang="<?= $data['db']['harga']; ?>">
                    <label for="harga_barang_piutang">Total harga</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="number" class="form-control" id="stok_barang_piutang" placeholder="stok barang" name="stok_barang_piutang" data-stok="<?= $data['db']['stok_barang_piutang']; ?>">
                    <label for="stok_barang_piutang">Jumlah Piutang: <?= $data['db']['stok_barang_piutang']; ?></label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>