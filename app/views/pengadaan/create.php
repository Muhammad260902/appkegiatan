<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $data['title']; ?></h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-sm-12">
                <?php Flasher::Message(); ?>
            </div>
        </div>
        <!-- Default box -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><?= $data['title']; ?></h3>
            </div>
            <div class="card-body">
                <form action="<?= base_url; ?>/pengadaan/simpanPengadaan" method="post" enctype="multipart/form-data">
                    <div class="row mb-3">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Kode Sub Kegiatan</label>
                                <select class="form-control" name="kode_sub_kegiatan">
                                    <option value="">Pilih</option>
                                    <?php foreach ($data['tb_subkegiatan'] as $row) : ?>
                                        <option value="<?= $row['id_subkegiatan']; ?>"><?= $row['kode_sub_kegiatan']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Sub Kegiatan</label>
                                <select class="form-control" name="nama_sub_kegiatan">
                                    <option value="">Pilih</option>
                                    <?php foreach ($data['tb_subkegiatan'] as $row) : ?>
                                        <option value="<?= $row['id_subkegiatan']; ?>"><?= $row['nama_sub_kegiatan']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nama_barang">Nama Barang</label>
                                <input type="text" class="form-control" id="nama_barang" name="nama_barang">
                            </div>
                            <div class="form-group">
                                <label for="satuan">satuan</label>
                                <input type="text" class="form-control" id="satuan" name="satuan">
                            </div>
                            <div class="form-group">
                                <label for="jumlah">Jumlah</label>
                                <input type="text" class="form-control" id="jumlah" name="jumlah" oninput="hitungTotal()">
                            </div>
                            <div class="form-group">
                                <label for="harga">Harga</label>
                                <input type="text" class="form-control" id="harga" name="harga" oninput="hitungTotal()">
                            </div>
                            <div class="form-group">
                                <label for="total">Total</label>
                                <input type="text" class="form-control" id="total" name="total" readonly>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script>
    function hitungTotal() {
        var jumlah = document.getElementById('jumlah').value;
        var harga = document.getElementById('harga').value;
        var total = parseFloat(jumlah) * parseFloat(harga);
        // Menampilkan format mata uang Rupiah
        document.getElementById('total').value = formatRupiah(total.toString(), 'Rp ');
    }

    // Function untuk format mata uang Rupiah
    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp ' + rupiah : '');
    }
</script>