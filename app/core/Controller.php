<?php

class Controller {

    public function view($location, $data = []) {
        require_once "../app/views/" . $location . '.php';
    }

    public function model($model) {
        require_once "../app/models/" . $model . '.php';
        return new $model;
    }

}