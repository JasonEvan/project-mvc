Database yang diperlukan

1. Buat Database namanya MyData
2. Buat Table daftar_langganan (id int, nama_langganan varchar(100), kota_langganan varchar(50), alamat_langganan varchar(200), no_telp_langganan varchar(20))
3. Buat Table daftar_salesman (id int, nama_sales varchar(100), no_depan int, no_nota int, no_telp_sales varchar(20), bukan_no_nota varchar(20))
4. Buat Table daftar_stock (id int, nama_barang varchar(150), harga_beli int, harga_jual int, stok_awal int)
5. Buat Table daftar_supplier (id int, nama_supplier varchar(100), kota_supplier varchar(50), alamat_supplier varchar(200), no_telp_supplier varchar(20))
6. Buat Table data_nota (id int, id_nama_langganan int, no_nota varchar(10), waktu DATE, rincian JSON)
7. Buat Table kartu_piutang (id int, id_nama_langganan int, datapiutang JSON)
