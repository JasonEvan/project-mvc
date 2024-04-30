<?php

class Home extends Controller {

    public function index() {
        $data["header"] = 'Home';
        $data["db"] = $this->model("Stock_model")->getTenStock();
        $this->view('templates/header', $data);
        $this->view('templates/navbar');
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }
}