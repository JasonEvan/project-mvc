<?php

class Transaksi extends Controller {

    public function index() {
        $data["header"] = 'Transaksi';
        $data["opsiLangganan"] = $this->model("Transaksi_model")->getOpsiLangganan();
        $data["opsiSalesman"] = $this->model("Transaksi_model")->getOpsiSales();
        $data["opsiBarang"] = $this->model("Transaksi_model")->getOpsiBarang();
        $this->view("templates/header", $data);
        $this->view('transaksi/index', $data);
        $this->view('templates/footer');
    }

    public function getnote() {
        $data["nota"] = $this->model("Transaksi_model")->getnota($_POST);
        echo json_encode($data["nota"]);
    }

    public function getqty() {
        $data["qty"] = $this->model("Transaksi_model")->getQuantity($_POST["nama"]);
        echo json_encode($data["qty"]);
    }

    public function getjual() {
        $data["kiriman"] = $this->model("Transaksi_model")->ambilData($_POST);
        echo $data["kiriman"];
    }
}