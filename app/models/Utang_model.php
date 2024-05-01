<?php

class Utang_model {

    private $table = 'utang';
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getSomeData() {
        $this->db->query("SELECT * FROM " . $this->table . " LIMIT 20");
        return $this->db->resultSet();
    }

    public function getData($id) {
        $this->db->query("SELECT * FROM " . $this->table . " WHERE id = :id");
        $this->db->bind('id', $id);
        return $this->db->singleSet();
    }

}