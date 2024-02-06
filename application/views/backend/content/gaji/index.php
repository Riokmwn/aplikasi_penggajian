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
                <?php if($this->session->flashdata('msg')){ ?>
                <div class="col-md-12">
                    <div class="alert alert-success" role="alert">
                        <?php echo $this->session->flashdata('msg'); ?>
                    </div>
                </div>
                <?php } ?>
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
                    <!-- </form> -->
                </div>
                <div class="col-md-12">
                    <div class="card">
                            <table class="table table-bordered table-responsive table-striped text-center">
                                <thead>
                                    <tr>
                                        <th rowspan="2">No</th>
                                        <?php if ($_SESSION['role_id'] != 2) { ?>
                                            <th rowspan="2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="flexCheckDefault">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        
                                                    </label>
                                                </div>
                                            </th>
                                        <?php } ?>
                                        <th rowspan="2">Bulan</th>
                                        <th rowspan="2">Tahun</th>
                                        <th rowspan="2">Tanggal Rekap Gaji</th>
                                        <th rowspan="2">Karyawan</th>
                                        <th rowspan="2">Posisi</th>
                                        <th rowspan="2">Absensi</th>
                                        <th colspan="3">Detail Bayaran Harian</th>
                                        <th colspan="4">Total Bayaran</th>
                                        <th colspan="3">Lembur</th>
                                        <th colspan="4">Pinalti</th>
                                        <th rowspan="2">Total</th>
                                    </tr>
                                    <tr>
                                        <th>Honor Harian</th>
                                        <th>Konsumsi</th>
                                        <th>Transportasi</th>

                                        <th>Honor Harian</th>
                                        <th>Konsumsi</th>
                                        <th>Transportasi</th>
                                        <th>Total</th>

                                        <th>Jam Lembur</th>
                                        <th>Bayaran per-Jam</th>
                                        <th>Total</th>

                                        <th>Telat</th>
                                        <th>Checkout Awal</th>
                                        <th>Potongan</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $num = 1; foreach ($karyawan as $key => $value) { ?>
                                        <tr>
                                            <td><?= $num ?></td>
                                            <?php if ($_SESSION['role_id'] != 2) { ?>
                                            <td>
                                                <?php if (isset($value->gaji->id_rekap_gaji_karyawan)) { ?>
                                                <div class="form-check">
                                                    <input class="form-check-input check-here" type="checkbox" value="<?= $value->gaji->id_rekap_gaji_karyawan ?>" name="check[]">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        
                                                    </label>
                                                </div>
                                                <?php }?>
                                            </td>
                                            <?php } ?>
                                            <td><?= $month[$bulan] ?></td>
                                            <td><?= $tahun ?></td>
                                            <td>
                                                <?php if ($value->gaji) { ?>
                                                    <?php if ($_SESSION['role_id'] != 2) { ?>
                                                    <button class="w-100 btn btn-success btn-sm mb-2" disabled><?= $value->gaji->tanggal_rekap ?></button><br>
                                                    <?php } ?>
                                                        <a target="_blank" href="<?= base_url('GajiController/cetak/' . $value->gaji->id_rekap_gaji_karyawan) ?>" class="w-100 btn btn-dark btn-sm">Cetak</a>
                                                <?php } else { ?>
                                                    <?php if ($_SESSION['role_id'] != 2) { ?>
                                                        <button name="rekap" type="submit" class="w-100 btn btn-info btn-sm" value="<?= $value->id_karyawan ?>">Rekap</button>
                                                    <?php } else { ?>
                                                        <button class="w-100 btn btn-success btn-sm" disabled>Belum ada data</button>
                                                    <?php } ?>
                                                <?php } ?>
                                            </td>
                                            <td><?= $value->nama_karyawan ?></td>
                                            <td><?= $value->nama_posisi ?></td>
                                            <?php if ($value->gaji) { ?>
                                                <td><?= $value->gaji->total_hari_masuk ?> hari</td>
                                                <td>Rp. <?= number_format($value->gaji->bayaran_harian) ?></td>
                                                <td>Rp. <?= number_format($value->gaji->bayaran_konsumsi_harian) ?></td>
                                                <td>Rp. <?= number_format($value->gaji->bayaran_transportasi_harian) ?></td>
                                                <td>Rp. <?= number_format($value->gaji->total_bayaran_harian)?></td>
                                                <td>Rp. <?= number_format($value->gaji->total_bayaran_konsumsi_harian) ?></td>
                                                <td>Rp. <?= number_format($value->gaji->total_bayaran_transportasi_harian) ?></td>
                                                <td><b>Rp. <?= number_format($value->gaji->total_bayaran_harian + $value->gaji->total_bayaran_konsumsi_harian + $value->gaji->total_bayaran_transportasi_harian) ?></b></td>
                                                <td><?= $value->gaji->total_jam_lembur ?> jam</td>
                                                <td>Rp. <?= number_format($value->gaji->bayaran_lembur_perjam) ?></td>
                                                <td><b>Rp. <?= number_format($value->gaji->total_bayaran_lembur_perjam) ?></b></td>
                                                <td><?= $value->gaji->total_hari_telat ?> hari</td>
                                                <td><?= $value->gaji->total_hari_checkout_awal ?> hari</td>
                                                <td>Rp. <?= number_format($value->gaji->bayaran_penalti) ?></td>
                                                <td><b>Rp. <?= number_format($value->gaji->total_bayaran_penalti) ?></b></td>
                                                <td><b>Rp. <?= number_format($value->gaji->total_bayaran) ?></b></td>
                                            <?php } else { ?>
                                                <td colspan="16"></td>
                                            <?php } ?>
                                        </tr>

                                    <?php $num++; } ?>
                                </tbody>
                            </table>
                            <?php if ($_SESSION['role_id'] != 2) { ?>
                            <div class="col-md-3 p-3">
                                <button type="submit" name="sendEmail" value="sendEmail" class="btn btn-success">Kirim Email</button>
                            </div>
                            <?php } ?>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).on('change', '#flexCheckDefault', function() {
        if ($(this).prop('checked')==true){ 
            $('.check-here').prop('checked', true);
        }else{
            $('.check-here').prop('checked', false);
        }
    })
</script>