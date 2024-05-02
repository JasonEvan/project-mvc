<?php

class Daftar_model {

    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function addStock($data) {
        $this->db->query("INSERT INTO daftar_stock (nama_barang, harga_beli, harga_jual, stok_awal) VALUES (
                            :nama, :beli, :jual, :stok)");
        $this->db->bind('nama', $data["nama_barang"]);
        $this->db->bind('beli', $data["harga_beli"]);
        $this->db->bind('jual', $data["harga_jual"]);
        $this->db->bind('stok', $data["stok_awal"]);
        $this->db->execute();
        return $this->db->rowCount();
    }
}