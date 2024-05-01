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

    public function cicilBarang($data) {
        $this->db->query("SELECT * FROM " . $this->table . " WHERE id = :id");
        $this->db->bind('id', $data['utang_id']);
        $data_lama = $this->db->singleSet();

        if ($data_lama["stok_barang_utang"] - $data["stok_barang_utang"] < 1) {
            $this->db->query("DELETE FROM " . $this->table . " WHERE id = :id");
        } else {
            $this->db->query("UPDATE " . $this->table . " SET stok_barang_utang = stok_barang_utang - :stok WHERE id = :id");
            $this->db->bind('stok', $data["stok_barang_utang"]);
        }

        $this->db->bind('id', $data['utang_id']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapuslgsg($id) {
        $this->db->query("DELETE FROM " . $this->table . " WHERE id = :id");
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function tambahUtang($data) {
        $this->db->query("INSERT INTO " . $this->table . " (nama_supplier, nama_barang, stok_barang_utang, harga) VALUES (:namasup, :barang, :stok, :harga)");
        $this->db->bind('namasup', $data["nama_supplier"]);
        $this->db->bind('barang', $data["nama_barang"]);
        $this->db->bind('stok', $data["stok_barang"]);
        $this->db->bind('harga', $data["harga"]);
        $this->db->execute();
        return $this->db->rowCount();
    }

}