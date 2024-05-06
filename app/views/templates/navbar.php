<nav class="navbar navbar-expand-lg bg-body-tertiary">
<div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="<?= BASEURL; ?>/home/index">Home</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Daftar
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?= BASEURL; ?>/daftar/index">Tabel Stock</a></li>
            <li><a class="dropdown-item" href="<?= BASEURL; ?>/daftar/langganan">Tabel Langganan</a></li>
            <li><a class="dropdown-item" href="<?= BASEURL; ?>/daftar/supplier">Tabel Supplier</a></li>
            <li><a class="dropdown-item" href="<?= BASEURL; ?>/daftar/salesman">Tabel Salesman</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Transaksi
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?= BASEURL; ?>/transaksi/index">Penjualan</a></li>
            <li><a class="dropdown-item" href="<?= BASEURL; ?>/transaksi/pembelian">Pembelian</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="<?= BASEURL; ?>/transaksi/lihat">Lihat Transaksi</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Utang Piutang
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?= BASEURL; ?>/utang/index">Utang</a></li>
            <li><a class="dropdown-item" href="<?= BASEURL; ?>/piutang/index">Piutang</a></li>
          </ul>
        </li>
    </ul>
    </div>
</div>
</nav>