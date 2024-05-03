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

    public function langgananBaru($data) {
        $this->db->query("INSERT INTO daftar_langganan (nama_langganan, kota_langganan, alamat_langganan, no_telp_langganan) VALUES (
                            :nama, :kota, :alamat, :notelp)");
        $this->db->bind('nama', $data["nama_langganan"]);
        $this->db->bind('kota', $data["kota_langganan"]);
        $this->db->bind('alamat', $data["alamat_langganan"]);
        $this->db->bind('notelp', $data["no_telp_langganan"]);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function supplierBaru($data) {
        $this->db->query("INSERT INTO daftar_supplier (nama_supplier, kota_supplier, alamat_supplier, no_telp_supplier) VALUES (
            :nama, :kota, :alamat, :notelp)");
        $this->db->bind('nama', $data["nama_supplier"]);
        $this->db->bind('kota', $data["kota_supplier"]);
        $this->db->bind('alamat', $data["alamat_supplier"]);
        $this->db->bind('notelp', $data["no_telp_supplier"]);
        $this->db->execute();
        return $this->db->rowCount();
    }
}