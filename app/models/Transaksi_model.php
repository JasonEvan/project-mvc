<?php

class Transaksi_model {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getOpsiLangganan() {
        $this->db->query("SELECT * FROM daftar_langganan");
        return $this->db->resultSet();
    }

    public function getOpsiSales() {
        $this->db->query("SELECT * FROM daftar_salesman");
        return $this->db->resultSet();
    }

    public function getnota($data) {
        $this->db->query("SELECT * FROM daftar_salesman WHERE nama_sales = :nama");
        $this->db->bind('nama', $data["nama"]);
        return $this->db->singleSet();
    }

    public function getOpsiBarang() {
        $this->db->query("SELECT * FROM daftar_stock");
        return $this->db->resultSet();
    }

    public function getQuantity($nama) {
        $this->db->query("SELECT * FROM daftar_stock WHERE nama_barang = :nama");
        $this->db->bind('nama', $nama);
        return $this->db->singleSet();
    }

    public function ambilData($post) {
        // ubah tanggal nota, no nota, jumlah transaksi, diskon ke bentuk object json
        $datas = [
            "tanggal" => $post["tanggal"],
            "no_nota" => $post["no_nota"],
            "nilai_transaksi" => $post["totalsemua"],
            "diskon" => $post["diskon"]
        ];
        

        // masukin ke database kartu piutang
            // check dulu ada ga data yang id_nama_langganan nya itu $post["id_nama_langganan"]
        
        $this->db->query("SELECT * FROM kartu_piutang WHERE id_nama_langganan = :id");
        $this->db->bind('id', $post["id_nama_langganan"]);
        $ada = $this->db->singleSet();

            // kalo ga ada lgsg insert into

        if (!$ada) {
            $this->db->query("INSERT INTO kartu_piutang (id_nama_langganan, datapiutang)
                            VALUES (:id, :datapiutang)");
            $this->db->bind('id', $post["id_nama_langganan"]);
            $this->db->bind('datapiutang', "[" . json_encode($datas) . "]");
            $this->db->execute();
            if ($this->db->rowCount() < 1) {
                return "gagal";
            }
        }

            // kalo ada langsung push
        else {
            $datalama = json_decode($ada["datapiutang"], true);
            array_push($datalama, $datas);
            $this->db->query("UPDATE kartu_piutang SET datapiutang = :datapiutang WHERE id = :id");
            $this->db->bind('datapiutang', json_encode($datalama));
            $this->db->bind('id', $ada["id"]);
            $this->db->execute();
            if ($this->db->rowCount() < 1) {
                return "gagal";
            }
        }

        // update list stok_awal di database daftar_stock
        foreach($post["datas"] as $row) {
            $this->db->query("UPDATE daftar_stock SET stok_awal = stok_awal - :stok WHERE nama_barang = :nama");
            $this->db->bind('stok', $row['qtyBarang']);
            $this->db->bind('nama', $row['namaBarang']);
            $this->db->execute();
            if ($this->db->rowCount() < 1) {
                return "gagal";
            }
        }


        // check apakah 5 digit no_nota terakhirnya itu == no_nota salesman + 1, kalo iya di increment, kalo enda jangan
        $isNotaNumber = false;
        $nota = substr($post["no_nota"], -5);
        $this->db->query("SELECT * FROM daftar_salesman WHERE nama_sales = :nama");
        $this->db->bind('nama', $post["salesman"]);
        $datalama = $this->db->singleSet();
        $notadatabase = str_pad($datalama["no_nota"] + 1, 5, "0", STR_PAD_LEFT);
        if ($nota == $notadatabase) {
            $this->db->query("UPDATE daftar_salesman SET no_nota = no_nota + 1 WHERE nama_sales = :nama");
            $this->db->bind('nama', $post["salesman"]);
            $this->db->execute();
            $isNotaNumber = true;
            if ($this->db->rowCount() < 1) {
                return "gagal";
            }
        }


        // masukin list barang beli ke database nota
        if ($isNotaNumber) {
            $this->db->query("INSERT INTO data_nota (id_nama_langganan, no_nota, waktu, rincian) VALUES(
                                :id, :no_nota, :waktu, :rincian)");
            $this->db->bind('no_nota', $post["no_nota"]);
        } else {
            $this->db->query("INSERT INTO data_nota (id_nama_langganan, no_nota, waktu, rincian) VALUES(
                                :id, :waktu, :rincian)");
        }

        $this->db->bind('id', $post["id_nama_langganan"]);
        $this->db->bind('waktu', $post["tanggal"]);
        $this->db->bind('rincian', "[" . json_encode($post["datas"]) . "]");
        $this->db->execute();
        if ($this->db->rowCount() < 1) {
            return "gagal";
        }

        return "berhasil";
    }

}