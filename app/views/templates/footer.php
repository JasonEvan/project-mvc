<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script>

    $(document).ready(function() {

        $('.button-trigger-utangModal').on('click', function() {
            const id = $(this).data('id');

            $.ajax({
                url: 'http://localhost/project-mvc/public/utang/getUtangById',
                data: { id: id },
                method: 'post',
                dataType: 'json',
                success: function(objData) {
                    
                    $('#utang_id').attr('value', objData.id);
                    $('#nama_supplier').val(objData.nama_supplier);
                    $('#nama_barang_utang').val(objData.nama_barang);
                    $('#utangHelp').html("Harga: " + objData.harga + " Jumlah Utang: " + objData.stok_barang_utang);

                    $('#stok_barang_utang').on('input', function() {
                        if ($(this).val() > objData.stok_barang_utang) {
                            $(this).val(objData.stok_barang_utang);
                        }
                        $('#harga_utang').val(objData.harga * $(this).val());

                    });
                }
            });

        });

        $('#stok_barang_piutang').on('input', function() {
            const stok = $(this).data('stok');
            const hargaPiutang = $('#harga_barang_piutang').data('hargapiutang');
            console.log($('#harga_barang_piutang').data('hargaPiutang'));

            if ($(this).val() > stok) {
                $(this).val(stok);
            }

            $('#harga_barang_piutang').val(hargaPiutang * $(this).val());
        });

    });

</script>
</body>
</html>