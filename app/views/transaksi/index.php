<div class="container mt-3">
    <div class="row justify-content-between">
        <div class="col-md-4">
            <div class="form-floating mb-3">
                <select class="form-select" id="nama_langganan" aria-label="Floating label select example">
                    <option  value="" selected>Nama Langganan</option>
                    <?php foreach ($data["opsiLangganan"] as $opsi) : ?>
                        <option value="<?= $opsi['id']; ?>"><?= $opsi['nama_langganan']; ?>/<?= $opsi['kota_langganan']; ?></option>
                    <?php endforeach; ?>
                </select>
                <label for="nama_langganan">Input nama langganan</label>
            </div>
            <div class="form-floating">
                <select class="form-select" id="nama_salesman" aria-label="Floating label select example">
                    <option  value="" selected>Nama Salesman</option>
                    <?php foreach ($data["opsiSalesman"] as $row) : ?>
                        <option value="<?= $row['nama_sales']; ?>"><?= $row['nama_sales']; ?></option>
                    <?php endforeach; ?>
                </select>
                <label for="nama_salesman">Input nama salesman</label>
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-3">
                <label for="no_nota" class="form-label">Nomor Nota</label>
                <input class="form-control" list="opsi" id="no_nota" placeholder="Input nomor nota">
                <datalist id="opsi">
                    <option id="optionnota">
                </datalist>
            </div>
            <div  class="mb-3">
                <label for="tanggalnota" class="form-label">Tgl. Nota</label>
                <input class="form-control" list="datalistOptions" id="tanggalnota" placeholder="2024/...">
                <datalist id="datalistOptions">
                    <option value="<?= date('Y-m-d'); ?>">
                </datalist>
            </div>
            <button class="btn btn-primary" id="ok">OK &raquo;</button>
        </div>
    </div>
    <hr>
    <div class="mt-3 d-none" id="tampilkantable">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Qty Barang</th>
                    <th scope="col">Total Harga</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody id="content">
                <tr id="todeleterow" class="text-center">
                    <td colspan="5"><button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modaladd">Add Data</button></td>
                </tr>
            </tbody>
        </table>
        <button class="btn btn-primary" id="tableoke">OKE!</button>
    </div>
    <hr>
    <div class="mt-3 mb-3 d-none" id="totalan">
        <div class="mb-3 row">
            <label for="totalHargaSemua" class="col-sm-2 col-form-label">Total Harga</label>
            <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext" id="totalHargaSemua" value="0">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="discount" class="col-sm-2 col-form-label">Discount</label>
            <div class="col-sm-10">
                <input type="text" class="form-control-plaintext" id="discount" value="0.00">
            </div>
        </div>
        <span>------------------------------------------------------------------------------------------</span>
        <div class="mb-3 row">
            <label for="bayar" class="col-sm-2 col-form-label">Bayar</label>
            <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext" id="bayar">
            </div>
        </div>
        <button class="btn btn-outline-primary" id="kumpulkanpenjualan">Submit</button>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modaladd" tabindex="-1" aria-labelledby="judulmodaladd" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="judulmodaladd">Masukkan data</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="">
            <div class="mb-3">
                <label for="pilihan-barang">Nama Barang</label>
                <select class="form-select" id="pilihan-barang">
                    <option id="default-selected" selected>Open this select menu</option>
                    <?php foreach ($data["opsiBarang"] as $baris) : ?>
                        <option value="<?= $baris['nama_barang']; ?>"><?= $baris["nama_barang"] ?> Qty = <?= $baris["stok_awal"]; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="qty">Qty. Barang</label>
                <input type="number" id="qty" class="form-control">
                <div class="form-text">
                Quantity tidak boleh lebih dari persediaan barang
                </div>
            </div>
            <div class="mb-3">
                <label for="harga-beli">Harga Beli</label>
                <input type="number" readonly id="harga-beli" class="form-control">
            </div>
            <div class="mb-3">
                <label for="harga-jual">Harga Jual</label>
                <input type="number" id="harga-jual" class="form-control">
            </div>
            <div class="mb-3">
                <label for="total">Total Harga</label>
                <input type="number" readonly id="total" class="form-control">
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" id="add-data" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>