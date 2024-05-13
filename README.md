Database yang diperlukan (copy paste satu persatu di sql)

1. CREATE DATABASE mydata
2. CREATE TABLE daftar_langganan (id INT PRIMARY KEY AUTO_INCREMENT, 
    nama_langganan varchar(100), 
    kota_langganan varchar(50), 
    alamat_langganan varchar(200), 
    no_telp_langganan varchar(20)
    );
3. CREATE TABLE daftar_salesman (id INT PRIMARY KEY AUTO_INCREMENT, 
    nama_sales varchar(100), 
    no_depan INT, 
    no_nota INT, 
    no_telp_sales varchar(20), 
    bukan_no_nota varchar(20)
    );
4. CREATE TABLE daftar_stock (id INT PRIMARY KEY AUTO_INCREMENT, 
    nama_barang varchar(150), 
    harga_beli INT, 
    harga_jual INT, 
    stok_awal INT
    );
6. CREATE TABLE  daftar_supplier (id INT PRIMARY KEY AUTO_INCREMENT, 
    nama_supplier varchar(100), 
    kota_supplier varchar(50), 
    alamat_supplier varchar(200), 
    no_telp_supplier varchar(20)
    );
7. CREATE TABLE data_nota (id INT PRIMARY KEY AUTO_INCREMENT, 
    id_nama_langganan INT, 
    no_nota varchar(10), 
    waktu DATE, 
    rincian JSON
    );
8. CREATE TABLE kartu_piutang (id INT PRIMARY KEY AUTO_INCREMENT, 
    id_nama_langganan INT, 
    datapiutang JSON
    );
