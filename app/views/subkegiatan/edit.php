<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Halaman Edit Sub Kegiatan</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><?= $data['title']; ?></h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="<?= base_url; ?>/subkegiatan/updateSubkegiatan" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id_subkegiatan" value="<?= $data['tb_subkegiatan']['id_subkegiatan']; ?>">
                <div class="card-body">
                    <div class="form-group">
                        <label>Kode Sub Kegiatan</label>
                        <input type="text" class="form-control" placeholder="masukkan kode sub kegiatan..." name="kode_sub_kegiatan" value="<?= $data['tb_subkegiatan']['kode_sub_kegiatan']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Nama Sub Kegiatan</label>
                        <input type="text" class="form-control" placeholder="masukkan nama sub kegiatan..." name="nama_sub_kegiatan" value="<?= $data['tb_subkegiatan']['nama_sub_kegiatan']; ?>">
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->