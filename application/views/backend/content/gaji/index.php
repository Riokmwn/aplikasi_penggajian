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
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <table class="table table-bordered table-responsive table-striped text-center">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Karyawan</th>
                                    <th>Posisi</th>
                                    <th>Total Hari Masuk</th>
                                    <th>Total Hari Telat</th>
                                    <th>Total Hari Check Awal</th>
                                    <th>Total Jam Lembur</th>
                                    <th>Bayaran Harian</th>
                                    <th>Bayaran Konsumsi Harian</th>
                                    <th>Bayaran Transport Harian</th>
                                    <th>Bayaran Lembur Perjam</th>
                                    <th>Bayaran Penalti</th>
                                    <th>Total Bayaran Harian</th>
                                    <th>Total Bayaran Konsumsi Harian</th>
                                    <th>Total Bayaran Transport Harian</th>
                                    <th>Total Bayaran Lemburan Perjam</th>
                                    <th>Total Potongan Penalti</th>
                                    <th>Total Bayaran </th>
                                    <th>Tanggal Rekap</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $num = 1; foreach ($gajian as $key => $value) { ?>

                                    <tr>
                                        <td><?= $num ?></td>
                                        <td><?= $value->nama_karyawan ?></td>
                                        <td><?= $value->nama_posisi ?></td>
                                        <td><?= $value->total_hari_masuk ?></td>
                                        <td><?= $value->total_hari_telat ?></td>
                                        <td><?= $value->total_hari_checkout_awal ?></td>
                                        <td><?= $value->total_jam_lembur ?></td>
                                        <td><?= $value->bayaran_harian ?></td>
                                        <td><?= $value->bayaran_konsumsi_harian ?></td>
                                        <td><?= $value->bayaran_transportasi_harian ?></td>
                                        <td><?= $value->bayaran_lembur_perjam ?></td>
                                        <td><?= $value->bayaran_penalti ?></td>
                                        <td><?= $value->total_bayaran_harian?></td>
                                        <td><?= $value->total_bayaran_konsumsi_harian ?></td>
                                        <td><?= $value->total_bayaran_transportasi_harian ?></td>
                                        <td><?= $value->total_bayaran_lembur_perjam ?></td>
                                        <td><?= $value->total_bayaran_penalti ?></td>
                                        <td><?= $value->total_bayaran ?></td>
                                        <td><?= $value->tanggal_rekap ?></td>
                                    </tr>

                                <?php $num++; } ?>
                                <?= count($gajian) < 1 ? '<tr><td colspan="18" class="text-center">Tidak ada data</td></tr>' : '' ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-md-4 mt-3">
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
                <div class="col-md-4 mt-3">
                    <button class="btn btn-primary">Rekap Absen</button>
                </div>
                    </form>
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->