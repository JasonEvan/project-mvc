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

    public function langganan() {
        $data["header"] = 'Daftar';
        $this->view("templates/header", $data);
        $this->view("daftar/langganan");
        $this->view("templates/footer");
    }

    public function tambahlangganan() {
        if ($this->model("Daftar_model")->langgananBaru($_POST) > 0) {
            Flasher::setFlash("langganan", "berhasil", "ditambahkan", "success");
            header('Location: ' . BASEURL . '/home');
            exit;
        } else {
            Flasher::setFlash("langganan", "gagal", "ditambahkan", "danger");
            header('Location: ' . BASEURL . '/home');
            exit;
        }
    }

    public function supplier() {
        $data["header"] = 'Daftar';
        $this->view("templates/header", $data);
        $this->view("daftar/supplier");
        $this->view("templates/footer");
    }

    public function tambahsupplier() {
        if ($this->model("Daftar_model")->supplierBaru($_POST) > 0) {
            Flasher::setFlash("supplier", "berhasil", "ditambahkan", "success");
            header('Location: ' . BASEURL . '/home');
            exit;
        } else {
            Flasher::setFlash("supplier", "gagal", "ditambahkan", "danger");
            header('Location: ' . BASEURL . '/home');
            exit;
        }
    }

    public function salesman() {
        $data["header"] = "Daftar";
        $this->view("templates/header", $data);
        $this->view("daftar/salesman");
        $this->view("templates/footer");
    }

    public function tambahsalesman() {
        if ($this->model("Daftar_model")->salesmanBaru($_POST) > 0) {
            echo "berhasil";
        } else {
            echo "gagal";
        }
    }

}