<div class="container mt-3">
    <div class="row">
        <div class="col">
            <h3>Tambah Daftar Supplier</h3>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <form action="<?= BASEURL; ?>/daftar/tambahsupplier" method="post">
                <div class="mb-3">
                    <label for="nama_supplier" class="form-label">Nama Supplier</label>
                    <input type="text" class="form-control" id="nama_supplier" aria-describedby="nama_supplier" name="nama_supplier">
                </div>
                <div class="mb-3">
                    <label for="kota_supplier" class="form-label">Kota</label>
                    <input type="text" class="form-control" id="kota_supplier" name="kota_supplier">
                </div>
                <div class="mb-3">
                    <label for="alamat_supplier" class="form-label">Alamat</label>
                    <input type="text" class="form-control" id="alamat_supplier" name="alamat_supplier">
                </div>
                <div class="mb-3">
                    <label for="no_telp_supplier" class="form-label">Nomor Telepon</label>
                    <input type="text" class="form-control" id="no_telp_supplier" name="no_telp_supplier">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>