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

}