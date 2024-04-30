<div class="container mt-3">
    <div class="row">
        <div class="col">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?= $data["db"]["nama_barang"]; ?></h5>
                    <h6 class="card-subtitle mb-2 text-body-secondary"><?= $data['db']['harga']; ?></h6>
                    <p class="card-text">Jumlah Stock saat ini: <?= $data['db']['stok_barang']; ?></p>
                    <form action="<?= BASEURL; ?>/stock/jualskrg" method="post">
                        <label for="jumlah" class="form-label">Jumlah</label>
                        <input type="hidden" value="<?= $data['db']['id']; ?>" name="id_barang_jual">
                        <input type="number" id="jumlah" class="form-control" aria-describedby="jumlahtepat" name="stok_barang_jual">
                        <div id="jumlahtepat" class="form-text">
                        Masukkan berapa jumlah barang yang ingin dijual. <b>Pastikan mengecek kembali jumlah yang ingin dijual</b>.
                        </div>
                        <button type="submit" class="btn btn-sm btn-primary mb-1 mt-1"
                                onclick="return confirm('Pastikan mengecek kembali')">Submit</button>
                    </form>
                    <a href="<?= BASEURL; ?>/stock" class="card-link"> &laquo; Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>