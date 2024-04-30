<?php

class Stock extends Controller {

    public function index() {
        $data["header"] = 'Stock';
        $data["db"] = $this->model("Stock_model")->getAllStock();
        $this->view('templates/header', $data);
        $this->view('templates/navbar');
        $this->view('stock/index', $data);
        $this->view('templates/footer');
    }

    public function tambah() {
        if ($this->model("Stock_model")->tambahData($_POST) > 0) {
            Flasher::setFlash("stock", "berhasil", "diupdate", "success");
            header('Location: ' . BASEURL . '/stock');
            exit;
        } else {
            Flasher::setFlash("stock", "gagal", "diupdate", "danger");
            header('Location: ' . BASEURL . '/stock');
            exit;
        }
    }

    public function jual($id) {
        $data["header"] = 'Jual Barang';
        $data["db"] = $this->model('Stock_model')->getDataById($id);
        $this->view('templates/header', $data);
        $this->view('stock/jual', $data);
        $this->view('templates/footer');
    }

    public function jualskrg() {
        if ($this->model('Stock_model')->jualStock($_POST) > 0) {
            Flasher::setFlash("stock", "berhasil", "dijual", "success");
            header('Location: '. BASEURL . '/stock');
            exit;
        } else {
            Flasher::setFlash("stock", "gagal", "dijual", "danger");
            header('Location: ' . BASEURL . '/stock');
            exit;
        }
    }

    public function hapus() {
        if ($this->model("Stock_model")->hapusBarang($_POST) > 0) {
            Flasher::setFlash("stock", "berhasil", "dihapus", "success");
            header('Location: ' . BASEURL . '/stock');
            exit;
        } else {
            Flasher::setFlash("stock", "gagal", "dihapus", "danger");
            header('Location: ' . BASEURL . '/stock');
            exit;
        }
    }

}