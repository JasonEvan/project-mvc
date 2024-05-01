<?php

class Piutang_model {
    private $table = 'piutang';
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getSomeData() {
        $this->db->query("SELECT * FROM " . $this->table . " LIMIT 20");
        return $this->db->resultSet();
    }

    public function getPiutangById($id) {
        $this->db->query("SELECT * FROM " . $this->table . " WHERE id = :id");
        $this->db->bind('id', $id);
        return $this->db->singleSet();
    }

    public function mencicil($data) {
        $this->db->query("SELECT * FROM " . $this->table . " WHERE id = :id");
        $this->db->bind('id', $data["piutang_id"]);
        $data_lama = $this->db->singleSet();

        if ($data["stok_barang_piutang"] < $data_lama["stok_barang_piutang"]) {
            $this->db->query("UPDATE " . $this->table . " SET stok_barang_piutang = stok_barang_piutang - :stok WHERE id = :id");
            $this->db->bind('stok', $data["stok_barang_piutang"]);
        } else {
            $this->db->query("DELETE FROM " . $this->table . " WHERE id = :id");
        }

        $this->db->bind('id', $data["piutang_id"]);
        $this->db->execute();
        return $this->db->rowCount();

    }

    public function hapusDataPiutang($id) {
        $this->db->query("DELETE FROM " . $this->table . " WHERE id = :id");
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }
}