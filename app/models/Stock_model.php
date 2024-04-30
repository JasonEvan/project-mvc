<?php

class Stock_model {
    private $table = 'stock';
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getAllStock() {
        $this->db->query("SELECT * FROM " . $this->table);
        return $this->db->resultSet();
    }

    public function getTenStock() {
        $this->db->query("SELECT * FROM " . $this->table . " LIMIT 10");
        return $this->db->resultSet();
    }

    public function tambahData($data) {
        $this->db->query("SELECT * FROM " . $this->table . " WHERE nama_barang = :nama");
        $this->db->bind('nama', $data["nama_barang_tambah"]);
        $ada = $this->db->singleSet();

        // $ada akan menghasilkan array jika ada, menghasilkan false jika ndaa ada
        if (!$ada) {
            $this->db->query("INSERT INTO " . $this->table . " (nama_barang, stok_barang, harga) VALUES (
                                :nama, :stok, :harga)");
        } else {
            $this->db->query("UPDATE " . $this->table . " SET stok_barang = stok_barang + :stok, 
                                harga = :harga  
                                WHERE nama_barang = :nama");
        }

        $this->db->bind('nama', $data["nama_barang_tambah"]);
        $this->db->bind('stok', $data["stok_barang_tambah"]);
        $this->db->bind('harga', $data["harga_tambah"]);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getDataById($id) {
        $this->db->query("SELECT * FROM " . $this->table . " WHERE id = :id");
        $this->db->bind('id', $id);
        return $this->db->singleSet();
    }

    public function jualStock($data) {
        $this->db->query("SELECT * FROM " . $this->table . " WHERE id = :id");
        $this->db->bind('id', $data["id_barang_jual"]);
        $data_lalu = $this->db->singleSet();

        if ($data_lalu['stok_barang'] - $data['stok_barang_jual'] < 0) {
            return 0;
        } else if ($data_lalu['stok_barang'] - $data['stok_barang_jual'] == 0) {
            $this->db->query("DELETE FROM " . $this->table . " WHERE id = :id");
        } else {
            $this->db->query("UPDATE " . $this->table . " SET stok_barang = stok_barang - :stok WHERE id = :id");
            $this->db->bind('stok', $data['stok_barang_jual']);
        }

        $this->db->bind('id', $data['id_barang_jual']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusBarang($data) {
        $this->db->query("DELETE FROM " . $this->table . " WHERE id = :id");
        $this->db->bind('id', $data["toDeleteId"]);
        $this->db->execute();
        return $this->db->rowCount();
    }
    
}