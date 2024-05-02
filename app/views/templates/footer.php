<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script>

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

    });

</script>
</body>
</html>