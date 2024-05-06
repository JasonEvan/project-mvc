<?php

class Daftar_model {

    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function addStock($data) {

        $this->db->query("SELECT * FROM daftar_stock WHERE nama_barang = :nama");
        $this->db->bind('nama', $data["nama_barang"]);
        $data_lama = $this->db->singleSet();

        if (!$data_lama) {
            $this->db->query("INSERT INTO daftar_stock (nama_barang, harga_beli, harga_jual, stok_awal) VALUES (
                                :nama, :beli, :jual, :stok)");
            $this->db->bind('nama', $data["nama_barang"]);
            $this->db->bind('beli', $data["harga_beli"]);
            $this->db->bind('jual', $data["harga_jual"]);
            $this->db->bind('stok', $data["stok_awal"]);
            $this->db->execute();
            return $this->db->rowCount();
        } else {
            return 0;
        }
    }

    public function langgananBaru($data) {

        $this->db->query("SELECT * FROM daftar_langganan WHERE nama_langganan = :nama AND kota_langganan = :kota");
        $this->db->bind('nama', $data["nama_langganan"]);
        $this->db->bind('kota', $data["kota_langganan"]);
        $data_lama = $this->db->singleSet();

        if (!$data_lama) {
            $this->db->query("INSERT INTO daftar_langganan (nama_langganan, kota_langganan, alamat_langganan, no_telp_langganan) VALUES (
                                :nama, :kota, :alamat, :notelp)");
            $this->db->bind('nama', $data["nama_langganan"]);
            $this->db->bind('kota', $data["kota_langganan"]);
            $this->db->bind('alamat', $data["alamat_langganan"]);
            $this->db->bind('notelp', $data["no_telp_langganan"]);
            $this->db->execute();
            return $this->db->rowCount();
        } else {
            return 0;
        }
    }

    public function supplierBaru($data) {

        $this->db->query("SELECT * FROM daftar_supplier WHERE nama_supplier = :nama AND kota_supplier = :kota");
        $this->db->bind('nama', $data["nama_supplier"]);
        $this->db->bind('kota', $data["kota_supplier"]);
        $data_lama = $this->db->singleSet();

        if (!$data_lama) {
            $this->db->query("INSERT INTO daftar_supplier (nama_supplier, kota_supplier, alamat_supplier, no_telp_supplier) VALUES (
                :nama, :kota, :alamat, :notelp)");
            $this->db->bind('nama', $data["nama_supplier"]);
            $this->db->bind('kota', $data["kota_supplier"]);
            $this->db->bind('alamat', $data["alamat_supplier"]);
            $this->db->bind('notelp', $data["no_telp_supplier"]);
            $this->db->execute();
            return $this->db->rowCount();
        } else {
            return 0;
        }

    }

    public function salesmanBaru($data) {
        // cek ada apa nda
        $this->db->query("SELECT * FROM daftar_salesman WHERE nama_sales = :nama");
        $this->db->bind('nama', $data["nama_sales"]);
        $data_lama = $this->db->singleSet();

        if (!$data_lama) {
            $this->db->query("INSERT INTO daftar_salesman (nama_sales, no_depan, no_telp_sales) VALUES (
                            :nama, :nodepan, :notelp)");
            $this->db->bind('nama', $data["nama_sales"]);
            $this->db->bind('nodepan', $data["no_depan"]);
            $this->db->bind('notelp', $data["no_telp_sales"]);
            $this->db->execute();
            return $this->db->rowCount();             
        } else {
            return 0;
        }
    }

    
}