<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script>

    function hitungTotal() {
        let total = 0;
        $('.ambildata').each(function() {
            total += Number($(this).find('.total-harga').text());
        });

        $('#totalan').removeClass("d-none");

        $('#totalHargaSemua').val(total);
        $('#bayar').val(total);
    }

    $(document).ready(function() {


        $('#utang-checkbox').on('change', function() {
            if ($(this).prop('checked')) {
                $('.nama-supplier-display').removeClass('d-none');
                $('#nama_supplier_utang').attr('name', 'nama_supplier');
            } else {
                $('.nama-supplier-display').addClass('d-none');
                $('#nama_supplier_utang').removeAttr('name');
            }
        });


        $('#submit-utang').on('click', function() {
            if ($('#utang-checkbox').prop('checked')) {
                const nama = $('#nama_supplier_utang').val();
                const nama_barang = $('#nama_barang').val();
                const stok = $('#stok_barang').val();
                const harga= $('#harga').val();

                $.ajax({
                    url: "http://localhost/project-mvc/public/utang/tambah",
                    data: { 
                        nama_supplier: nama,
                        nama_barang: nama_barang,
                        stok_barang: stok,
                        harga: harga 
                    },
                    method: 'post',
                    dataType: 'text',
                    success: function(pesan) {
                        alert('Utang ' + pesan + ' ditambahkan');
                    }
                });
            }
        });

        $('#submit-sales').on('click', function() {
            const nama_sales = $('#nama_sales').val();
            const no_telp_sales = $('#no_telp_sales').val();
            let no_depan = 0;

            if ($('#no_depan').val() != 0 && $('#no_depan').val() != null) {
                no_depan = $('#no_depan').val();
            }

            $.ajax({
                url: 'http://localhost/project-mvc/public/daftar/tambahsalesman',
                data: {
                    nama_sales: nama_sales,
                    no_telp_sales: no_telp_sales,
                    no_depan: no_depan
                },
                method: 'post',
                dataType: 'text',
                success: function(responseText) {
                    alert(`Data Salesman ${responseText} ditambahkan`);
                    window.location.href = 'http://localhost/project-mvc/public/home';
                }
            });
        });


        $('#nama_salesman').on('change', function() {
            const nama = $(this).val();

            $.ajax({
                url: "http://localhost/project-mvc/public/transaksi/getnote",
                data: {
                    nama: nama
                },
                method: 'post',
                dataType: 'json',
                success: function(result) {
                    const nota = (result.no_depan).toString() + (result.no_nota + 1).toString().padStart(5, '0');
                    $('#optionnota').val(result.no_nota + 1);
                    $('#no_nota').val(nota);
                }
            });
        });


        $('#ok').on('click', function() {
            const langganan = $('#nama_langganan').val();
            const sales = $('#nama_salesman').val();
            const nota = $('#no_nota').val();
            const tanggalnota = $('#tanggalnota').val();

            if (langganan !== '' && sales !== '' && nota !== '' && tanggalnota !== '') {
                $('#tampilkantable').removeClass("d-none");
                $('#nama_langganan').attr('disabled', 'disabled');
                $('#nama_salesman').attr('disabled', 'disabled');
                $('#no_nota').attr('disabled', 'disabled');
                $('#tanggalnota').attr('disabled', 'disabled');
            } else {
                alert('Belum semua data terisi');
            }
        });



        $('#qty').on('input', function() {
            const nama = $('#pilihan-barang').val();

            $.ajax({
                url: 'http://localhost/project-mvc/public/transaksi/getqty',
                data: {nama: nama},
                method: 'post',
                dataType: 'json',
                success: function(result) {
                    const maxNumber = Number(result.stok_awal);
                    $('#harga-beli').val(result.harga_beli);
                    $('#harga-jual').val(result.harga_jual);
                    if ($('#qty').val() > maxNumber) {
                        $('#qty').val(maxNumber);
                    }
                    $('#total').val(Number($('#qty').val()) * Number($('#harga-jual').val()));
                }
            });

        });


        $('#harga-jual').on('blur', function() {
            if (Number($(this).val()) <= Number($('#harga-beli').val())) {
                $(this).val($('#harga-beli').val());
            }
            $('#total').val(Number($('#qty').val()) * Number($('#harga-jual').val()));
        });



        $('#add-data').on('click', function(){
            const iya = confirm('Apakah sudah dicek kembali?');
            if (iya) {
                $('#todeleterow').remove();
                $('#modaladd').modal('hide');

                const nama = $('#pilihan-barang').val();
                const qty = $('#qty').val();
                const total = $('#total').val();

                // reset modal
                $('#pilihan-barang').val($('#default-selected').val());
                $('#qty').val('');
                $('#harga-beli').val('');
                $('#harga-jual').val('');
                $('#total').val('');

                $('#content').append(`
                    <tr class="ambildata">
                        <th scope="row">‣</th>
                        <td class="nama-barang">${nama}</td>
                        <td class="qty-barang">${qty}</td>
                        <td class="total-harga">${total}</td>
                        <td><button class="btn btn-close"></button></td>
                    </tr>
                    <tr id="todeleterow" class="text-center">
                        <td colspan="5"><button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modaladd">Add Data</button></td>
                    </tr>
                `);
            }
        });



        $('#tableoke').on('click', function() {
            hitungTotal();
        });


        $('#discount').on('input', function() {
            const diskon = Number($(this).val());
            const harga = Number($('#totalHargaSemua').val());
            const jadi = harga - (harga * diskon);
            $('#bayar').val(jadi);
        });


        $('#kumpulkanpenjualan').on('click', function() {
            const yes = confirm('Are you sure?');
            if (yes) {

                const id_nama_langganan = $('#nama_langganan').val();
                const salesman = $('#nama_salesman').val();
                const no_nota = $('#no_nota').val();
                const tanggal = $('#tanggalnota').val();

                //ambil data barang
                let datas = [];
                $('.ambildata').each(function() {
                    let row = {};
                    row.namaBarang = $(this).find('.nama-barang').text();
                    row.qtyBarang = $(this).find('.qty-barang').text();
                    row.totalHarga = Number($(this).find('.total-harga').text());
                    datas.push(row);
                });

                
                const totalsemua = $('#bayar').val();
                const diskon = $('#discount').val();
                

                $.ajax({
                    url: "http://localhost/project-mvc/public/transaksi/getjual",
                    data: {
                        id_nama_langganan: id_nama_langganan,
                        salesman: salesman,
                        no_nota: no_nota,
                        tanggal: tanggal,
                        datas: datas,
                        totalsemua: totalsemua,
                        diskon: diskon
                    },
                    method: 'post',
                    dataType: 'text',
                    success: function(result) {
                        if (result == "berhasil") {
                            alert("Penjualan berhasil");
                        } else {
                            alert('Penjualan gagal');
                        }
                    }
                })
            }
        })

    });

    $(document).on('click', '.ambildata .btn-close', function() {
        const yakin = confirm('Apakah anda yakin?');
        if (yakin) {
            $(this).closest('.ambildata').remove();
            if ($('#totalHargaSemua').val() != 0) {
                hitungTotal();
            }
        }
    });

</script>
</body>
</html>