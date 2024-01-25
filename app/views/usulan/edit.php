<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Halaman Edit Usulan Kegiatan</h1>
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
            <form role="form" action="<?= base_url; ?>/usulan/updateUsulan" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $data['tb_usulan']['id']; ?>">
                <div class="card-body">
                    <div class="form-group">
                        <label>Menu Usulan</label>
                        <input type="text" class="form-control" placeholder="masukkan menu usulan..." name="menu_usulan" value="<?= $data['tb_usulan']['menu_usulan']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Persyaratan</label>
                        <input type="text" class="form-control" placeholder="masukkan persyaratan..." name="persyaratan" value="<?= $data['tb_usulan']['persyaratan']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Program/Kegiatan/Sub Kegiatan</label>
                        <input type="text" class="form-control" placeholder="masukkan program/kegiatan/sub kegiatan..." name="kegiatan" value="<?= $data['tb_usulan']['kegiatan']; ?>">
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