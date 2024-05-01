<?php

class Utang extends Controller {

    public function index() {
        $data["header"] = 'Utang';
        $data["db"] = $this->model("Utang_model")->getSomeData();
        $this->view('templates/header', $data);
        $this->view('templates/navbar');
        $this->view('utang/index', $data);
        $this->view('templates/footer');
    }

    public function getUtangById() {
        $data["orang"] = $this->model('Utang_model')->getData($_POST["id"]);
        echo json_encode($data["orang"]);
    }

    public function cicil() {
        if ($this->model("Utang_model")->cicilBarang($_POST) > 0) {
            Flasher::setFlash("utang", "berhasil", "dilunasi", "success");
            header('Location: ' . BASEURL . '/utang');
            exit;
        } else {
            Flasher::setFlash("utang", "gagal", "dilunasi", "danger");
            header('Location: ' . BASEURL . '/utang');
            exit;
        }
    }

    public function hapusUtang($id) {
        if ($this->model("Utang_model")->hapuslgsg($id) > 0) {
            Flasher::setFlash("utang", "berhasil", "dihapus", "success");
            header('Location: ' . BASEURL . '/utang');
            exit;
        } else {
            Flasher::setFlash("utang", "gagal", "dihapus", "danger");
            header('Location: ' . BASEURL . '/utang');
            exit;
        }
    }

}