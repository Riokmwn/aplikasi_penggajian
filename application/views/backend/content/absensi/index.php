<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-5">
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
                <div class="col-md-12">
                    <form method="post">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <select class="form-control" id="karyawan_id" name="karyawan_id">
                                        <option value="">Pilih Karyawan:</option>
                                        <?php foreach ($karyawan as $key => $value) { ?>
                                            <option value="<?= $value->id_karyawan ?>" <?= $value->id_karyawan == $karyawan_id ? 'selected' : '' ?> ><?= $value->nama_karyawan ?></option>
                                        <?php } ?>
                                    </select>
                                    <?php echo form_error('karyawan_id', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <select class="form-control" id="bulan" name="bulan">
                                        <option value="">Pilih Bulan:</option>
                                        <?php
                                            $month = array(
                                                '01' => 'Januari' , '02' => 'Februari', '03' => 'Maret' , '04' => 'April' , '05' => 'Mei' , '06' => 'Juni' , '07' => 'Juli' , '08' => 'Agustus' , '09' => 'September' , '10' => 'Oktober' ,'11' => 'November' ,'12' => 'Desember' ,
                                            );
                                            foreach ($month as $row => $val) { ?>
                                        <option value="<?php echo $row ?>" <?= $bulan == $row ? 'selected' : '' ?>>
                                            <?php echo $val ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                    <?php echo form_error('bulan', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <select class="form-control" id="tahun" name="tahun">
                                        <option value="">Pilih Tahun:</option>
                                        <?php
                                            $current_year = date('Y');
                                            for ($i = 2020; $i <= $current_year; $i++) { ?>
                                        <option value="<?php echo $i ?>" <?= $tahun == $i ? 'selected' : '' ?>>
                                            <?php echo $i ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                    <?php echo form_error('tahun', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <button class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <table class="table table-bordered table-striped text-center">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Waktu Check In</th>
                                    <th>Waktu Check Out</th>
                                    <th>Jumlah Jam Lembur</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $num = 1; foreach ($absensi as $key => $value) { ?>
                                    <tr>
                                        <td><?= $num ?></td>
                                        <td><?= date('d M Y', strtotime($value->tanggal)) ?></td>
                                        <td <?= $value->parameter_telat == 1 ? 'class="bg-warning"' : '' ?>><?= $value->waktu_checkin ?></td>
                                        <td <?= $value->parameter_checkout_awal == 1 ? 'class="bg-warning"' : '' ?>><?= $value->waktu_checkout ?></td>
                                        <td><?= $value->jumlah_jam_lembur ?></td>
                                    </tr>
                                <?php $num++; } ?>
                                <?= count($absensi) < 1 ? '<tr><td colspan="5" class="text-center">Tidak ada data</td></tr>' : '' ?>
                            </tbody>
                        </table>
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