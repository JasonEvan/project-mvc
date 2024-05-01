<?php

class Piutang extends Controller {
    
    public function index() {
        $data["header"] = 'Piutang';
        $data["db"] = $this->model("Piutang_model")->getSomeData();
        $this->view('templates/header', $data);
        $this->view('templates/navbar');
        $this->view('piutang/index', $data);
        $this->view('templates/footer');
    }

    public function cicil($id) {
        $data["header"] = "Piutang";
        $data["db"] = $this->model("Piutang_model")->getPiutangById($id);
        $this->view("templates/header", $data);
        $this->view("piutang/cicil", $data);
        $this->view("templates/footer");
    }

    public function cicilSedikit() {
        if ($this->model("Piutang_model")->mencicil($_POST) > 0) {
            Flasher::setFlash("piutang", "berhasil", "dilunasi", "success");
            header('Location: '. BASEURL . '/piutang');
            exit;
        } else {
            Flasher::setFlash("piutang", "gagal", "dilunasi", "danger");
            header('Location: '. BASEURL . '/piutang');
            exit;
        }
    }

    public function hapusPiutang($id) {
        if ($this->model("Piutang_model")->hapusDataPiutang($id) > 0) {
            Flasher::setFlash("piutang", "berhasil", "dilunasi semua", "success");
            header('Location: '. BASEURL . '/piutang');
            exit;
        } else {
            Flasher::setFlash("piutang", "gagal", "dilunasi semua", "danger");
            header('Location: '. BASEURL . '/piutang');
            exit;
        }
    }

}