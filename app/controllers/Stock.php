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
            header('Location: ' . BASEURL . '/stock');
            exit;
        }
    }

    public function jual() {
        $data["header"] = 'Stock';
        $this->view('templates/header', $data);
        $this->view('templates/navbar');
        $this->view('stock/jual');
        $this->view('templates/footer');
    }

}