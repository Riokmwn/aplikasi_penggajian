<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Ubah Jabatan</h1>
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
                            <h3 class="card-title">Form Ubah Jabatan</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="<?= base_url('C_Jabatan/edit_jabatan/' . $id_jabatan) ?>" method="post">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="jabatan_nama">Jabatan:</label>
                                    <input type="text" class="form-control" id="jabatan_nama" placeholder="Jabatan"
                                        name="jabatan_nama" value="<?php echo $jabatan->jabatan_nama ?>">
                                    <?php echo form_error('jabatan_nama', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="gaji_pokok">Gaji Pokok:</label>
                                    <input type="text" class="form-control" id="gaji_pokok" placeholder="Gaji Pokok"
                                        name="gaji_pokok" onkeyup="formatNumber(this)"
                                        value="<?php echo number_format($jabatan->jabatan_gaji_pokok) ?>">
                                    <?php echo form_error('gaji_pokok', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="uang_makan">Uang Makan:</label>
                                    <input type="text" class="form-control" id="uang_makan" placeholder="Uang Makan"
                                        name="uang_makan" onkeyup="formatNumber(this)"
                                        value="<?php echo number_format($jabatan->jabatan_gaji_makan) ?>">
                                    <?php echo form_error('uang_makan', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="transportasi">Transportasi:</label>
                                    <input type="text" class="form-control" id="transportasi" placeholder="Transportasi"
                                        name="transportasi" onkeyup="formatNumber(this)"
                                        value="<?php echo number_format($jabatan->jabatan_gaji_transportasi) ?>">
                                    <!-- style=" height: 260px; width: 609px;" -->
                                    <?php echo form_error('transportasi', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <input type="hidden" class="form-control" id="id_jabatan" placeholder="ID Jabatan"
                                    name="id_jabatan" value="<?php echo $id_jabatan ?>">
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button id="back-button" data-url="<?= base_url('C_Jabatan/data_jabatan') ?>"
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