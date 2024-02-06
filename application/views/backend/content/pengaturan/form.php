<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $judul ?></h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-8">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="post">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="jam_masuk">Jam Masuk:</label>
                                    <input type="time" class="form-control" id="jam_masuk" placeholder="Jam Masuk"
                                        name="jam_masuk" value="<?php echo $pengaturan->jam_masuk ?? NULL ?>">
                                    <?php echo form_error('jam_masuk', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="menit_masuk_toleransi">Toleransi Menit Masuk:</label>
                                    <input type="number" min="1" class="form-control" id="menit_masuk_toleransi" placeholder="Toleransi Menit Masuk"
                                        name="menit_masuk_toleransi" value="<?php echo $pengaturan->menit_masuk_toleransi ?? NULL ?>">
                                    <?php echo form_error('menit_masuk_toleransi', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="jam_keluar">Jam Keluar:</label>
                                    <input type="time" class="form-control" id="jam_keluar" placeholder="Jam Keluar"
                                        name="jam_keluar" value="<?php echo $pengaturan->jam_keluar ?? NULL ?>">
                                    <?php echo form_error('jam_keluar', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                

                                
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button id="back-button" data-url="<?= base_url('PengaturanController') ?>"
                                    class="btn btn-secondary">Kembali</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->