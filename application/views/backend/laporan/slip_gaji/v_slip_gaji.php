<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Laporan Slip Gaji Karyawan</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <!-- left column -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Form Laporan Slip Gaji Karyawan</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Pilih Bulan:</label>
                                <select class="form-control" id="bulan" name="bulan">
                                    <option value="">Pilih Bulan:</option>
                                    <?php
                                    $bulan = array(
                                        'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
                                    );
                                    foreach ($bulan as $row) { ?>
                                        <option value="<?php echo $row ?>">
                                            <?php echo $row ?>
                                        </option>
                                    <?php } ?>
                                </select>
                                <?php echo form_error('bulan', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Pilih Tahun:</label>
                                <select class="form-control" id="tahun" name="tahun">
                                    <option value="">Pilih Tahun:</option>
                                    <?php
                                    $current_year = date('Y');
                                    for ($i = 2020; $i <= $current_year; $i++) { ?>
                                        <option value="<?php echo $i ?>">
                                            <?php echo $i ?>
                                        </option>
                                    <?php } ?>
                                </select>
                                <?php echo form_error('tahun', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="karyawan">Karyawan:</label>
                                <select class="form-control" id="karyawan" name="karyawan">
                                    <option value="">Pilih Karyawan</option>
                                    <?php foreach ($karyawan as $row) { ?>
                                        <option value="<?php echo $row->id_karyawan ?>"><?php echo $row->karyawan_nama ?>
                                        </option>
                                    <?php } ?>
                                </select>
                                <?php echo form_error('karyawan', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button id="print_slip_gaji" type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.card -->
            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->