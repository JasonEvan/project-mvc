<?php

class Utang extends Controller {

    public function index() {
        $data["header"] = 'Utang';
        $this->view('templates/header', $data);
        $this->view('templates/navbar');
        $this->view('utang/index');
        $this->view('templates/footer');
    }

}