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
                                    <label for="nama_karyawan">Nama Karyawan:</label>
                                    <input type="text" class="form-control" id="nama_karyawan" placeholder="Nama Karyawan"
                                        name="nama_karyawan" value="<?php echo $karyawan->nama_karyawan ?? NULL ?>">
                                    <?php echo form_error('nama_karyawan', '<small class="text-danger">', '</small>'); ?>
                                </div>

                                <div class="form-group">
                                    <label for="posisi_id">Posisi</label>
                                    <select class="form-control" id="posisi_id" name="posisi_id">
                                        <option value="">Pilih Posisi</option>
                                        <?php foreach ($posisi as $row) { ?>
                                        <option value="<?php echo $row->id_posisi ?>"
                                            <?php echo (isset($karyawan->posisi_id) && $karyawan->posisi_id == $row->id_posisi) ? 'selected' : '' ?>>
                                            <?php echo $row->nama_posisi ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                    <?php echo form_error('posisi_id', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                

                                
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button id="back-button" data-url="<?= base_url('Nama Karyawan/data_karyawan') ?>"
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