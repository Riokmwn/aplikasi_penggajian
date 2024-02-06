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
                                    <label for="nama_posisi">Nama Posisi:</label>
                                    <input type="text" class="form-control" id="nama_posisi" placeholder="Nama Posisi"
                                        name="nama_posisi" value="<?php echo $posisi->nama_posisi ?? NULL ?>">
                                    <?php echo form_error('nama_posisi', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                
                                <div class="form-group">
                                    <label for="bayaran_harian">Bayaran Harian</label>
                                    <input type="text" class="form-control" id="bayaran_harian" placeholder="Bayaran Harian"
                                        name="bayaran_harian" onkeyup="formatNumber(this)"
                                        value="<?php echo number_format($posisi->bayaran_harian ?? 0) ?>">
                                    <?php echo form_error('bayaran_harian', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                
                                <div class="form-group">
                                    <label for="bayaran_konsumsi_harian">Bayaran Konsumsi Harian</label>
                                    <input type="text" class="form-control" id="bayaran_konsumsi_harian" placeholder="Bayaran Konsumsi Harian"
                                        name="bayaran_konsumsi_harian" onkeyup="formatNumber(this)"
                                        value="<?php echo number_format($posisi->bayaran_konsumsi_harian ?? 0) ?>">
                                    <?php echo form_error('bayaran_konsumsi_harian', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                
                                <div class="form-group">
                                    <label for="bayaran_transportasi_harian">Bayaran Transportasi Harian</label>
                                    <input type="text" class="form-control" id="bayaran_transportasi_harian" placeholder="Bayaran Transportasi Harian"
                                        name="bayaran_transportasi_harian" onkeyup="formatNumber(this)"
                                        value="<?php echo number_format($posisi->bayaran_transportasi_harian ?? 0) ?>">
                                    <?php echo form_error('bayaran_transportasi_harian', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                
                                <div class="form-group">
                                    <label for="bayaran_lembur_perjam">Bayaran Lembur per-Jam</label>
                                    <input type="text" class="form-control" id="bayaran_lembur_perjam" placeholder="Bayaran Lembur per-Jam"
                                        name="bayaran_lembur_perjam" onkeyup="formatNumber(this)"
                                        value="<?php echo number_format($posisi->bayaran_lembur_perjam ?? 0) ?>">
                                    <?php echo form_error('bayaran_lembur_perjam', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                
                                <div class="form-group">
                                    <label for="bayaran_penalti">Potongan Penalti</label>
                                    <input type="text" class="form-control" id="bayaran_penalti" placeholder="Potongan Penalti"
                                        name="bayaran_penalti" onkeyup="formatNumber(this)"
                                        value="<?php echo number_format($posisi->bayaran_penalti ?? 0) ?>">
                                    <?php echo form_error('bayaran_penalti', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                

                                
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button id="back-button" data-url="<?= base_url('PosisiController') ?>"
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