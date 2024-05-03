<div class="container mt-3">
    <div class="row">
        <div class="col">
            <h3>Tambah Daftar Langganan</h3>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <form action="<?= BASEURL; ?>/daftar/tambahlangganan" method="post">
                <div class="mb-3">
                    <label for="nama_langganan" class="form-label">Nama Langganan</label>
                    <input type="text" class="form-control" id="nama_langganan" aria-describedby="nama_langganan" name="nama_langganan" required>
                </div>
                <div class="mb-3">
                    <label for="kota_langganan" class="form-label">Kota</label>
                    <input type="text" class="form-control" id="kota_langganan" name="kota_langganan" required>
                </div>
                <div class="mb-3">
                    <label for="alamat_langganan" class="form-label">Alamat</label>
                    <input type="text" class="form-control" id="alamat_langganan" name="alamat_langganan" required>
                </div>
                <div class="mb-3">
                    <label for="no_telp_langganan" class="form-label">Nomor Telepon</label>
                    <input type="text" class="form-control" id="no_telp_langganan" name="no_telp_langganan" required>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>