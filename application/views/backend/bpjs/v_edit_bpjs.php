<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Ubah BPJS</h1>
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
                            <h3 class="card-title">Form Ubah BPJS</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="<?= base_url('C_Bpjs/edit_bpjs/' . $id_bpjs) ?>" method="post">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="bpjs_kelas">Kelas BPJS:</label>
                                    <input type="text" class="form-control" id="bpjs_kelas" placeholder="BPJS"
                                        name="bpjs_kelas" value="<?php echo $data_bpjs->bpjs_kelas ?>">
                                    <?php echo form_error('bpjs_kelas', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="bpjs_biaya">Biaya:</label>
                                    <input type="text" class="form-control" id="bpjs_biaya" placeholder="Gaji Pokok"
                                        name="bpjs_biaya" onkeyup="formatNumber(this)"
                                        value="<?php echo number_format($data_bpjs->bpjs_biaya) ?>">
                                    <?php echo form_error('bpjs_biaya', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <input type="hidden" class="form-control" id="id_bpjs" placeholder="ID BPJS"
                                    name="id_bpjs" value="<?php echo $id_bpjs ?>">
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button id="back-button" data-url="<?= base_url('C_Bpjs/data_bpjs') ?>"
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