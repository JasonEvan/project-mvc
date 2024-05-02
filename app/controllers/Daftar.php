<?php

class Daftar extends Controller {

    public function index() {
        $data["header"] = 'Daftar';
        $this->view("templates/header", $data);
        $this->view("daftar/index");
        $this->view("templates/footer");
    }

    public function tambahstock() {
        if ($this->model("Daftar_model")->addStock($_POST) > 0) {
            Flasher::setFlash("stock", "berhasil", "ditambahkan", "success");
            header('Location: ' . BASEURL . '/home');
            exit;
        } else {
            Flasher::setFlash("stock", "gagal", "ditambahkan", "danger");
            header('Location: ' . BASEURL . '/home');
            exit;
        }
    }

}