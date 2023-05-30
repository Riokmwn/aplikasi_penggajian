<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Rekap Absen Karyawan</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Rekap Absen Karyawan</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <?php if (empty($rekap_karyawan)) { ?>
                            <p>Data Belum Ada</p>
                            <?php } else { ?>
                            <form action="<?= base_url('C_Rekap_Absen/add_rekap_absen') ?>" method="post">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
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
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
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
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped text-center">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Username</th>
                                                <th>Nama Pengguna</th>
                                                <th>Jabatan</th>
                                                <th>Hadir</th>
                                                <th>Telat</th>
                                                <th>Izin</th>
                                                <th>Sakit</th>
                                                <th>Tidak Hadir</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $no = 1;
                                                foreach ($rekap_karyawan as $rekap) { ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $rekap->nik_karyawan; ?></td>
                                                <td><?= $rekap->karyawan_nama; ?></td>
                                                <td><?= $rekap->jabatan_nama; ?></td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="hadir[]"
                                                            name="hadir[]">
                                                        <?php echo form_error('hadir[]', '<small class="text-danger">', '</small>'); ?>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="telat[]"
                                                            name="telat[]">
                                                        <?php echo form_error('telat[]', '<small class="text-danger">', '</small>'); ?>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="izin[]"
                                                            name="izin[]">
                                                        <?php echo form_error('izin[]', '<small class="text-danger">', '</small>'); ?>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="sakit[]"
                                                            name="sakit[]">
                                                        <?php echo form_error('sakit[]', '<small class="text-danger">', '</small>'); ?>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="tidak_hadir[]"
                                                            name="tidak_hadir[]">
                                                        <?php echo form_error('tidak_hadir[]', '<small class="text-danger">', '</small>'); ?>
                                                    </div>
                                                </td>
                                                <input type="hidden" class="form-control" id="id_karyawan[]"
                                                    placeholder="ID Karyawan" name="id_karyawan[]"
                                                    value="<?php echo $rekap->id_karyawan ?>">
                                            </tr>
                                            <?php } ?>
                                            <input type="hidden" id="total_data" name="total_data"
                                                value="<?= count($rekap_karyawan); ?>">
                                        </tbody>
                                    </table>
                                </div>
                                <?php } ?>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary float-right">Submit</button>
                                    <button id="back-button"
                                        data-url="<?= base_url('C_Rekap_Absen/data_rekap_absen') ?>"
                                        class="btn btn-secondary">Kembali</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
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