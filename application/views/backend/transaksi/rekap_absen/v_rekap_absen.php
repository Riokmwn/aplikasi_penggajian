<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Absen Karyawan</h1>
                </div>
            </div>

            <div class="row col-md-2">
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

            <div class="row col-md-2">
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

            <a href="<?= base_url('') ?>" type="button" class="btn btn-success">
                Lihat Rekap Absen
            </a>

            <a href="<?= base_url('C_Rekap_Absen/add_rekap_absen') ?>" type="button" class="btn btn-primary">
                Tambah Rekap Absen
            </a>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Absen Karyawan</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <?php if (empty($rekap_absen)) { ?>
                                <p>Data Belum Ada</p>
                            <?php } else { ?>
                                <table class="table table-bordered table-striped text-center">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nik Karyawan</th>
                                            <th>Nama Karyawan</th>
                                            <th>Jabatan Karyawan</th>
                                            <th>Bulan</th>
                                            <th>Tahun</th>
                                            <th>Hadir</th>
                                            <th>Telat</th>
                                            <th>Izin</th>
                                            <th>Sakit</th>
                                            <th>Tidak Hadir</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($rekap_absen as $rekap) { ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $rekap->nik_karyawan; ?></td>
                                                <td><?= $rekap->karyawan_nama; ?></td>
                                                <td><?= $rekap->jabatan_nama; ?></td>
                                                <td><?= $rekap->rekap_absen_bulan; ?></td>
                                                <td><?= $rekap->rekap_absen_tahun; ?></td>
                                                <td><?= $rekap->rekap_absen_hadir; ?></td>
                                                <td><?= $rekap->rekap_absen_telat; ?></td>
                                                <td><?= $rekap->rekap_absen_izin; ?></td>
                                                <td><?= $rekap->rekap_absen_sakit; ?></td>
                                                <td><?= $rekap->rekap_absen_tidak_hadir; ?></td>
                                                <td>
                                                    <a href="<?= base_url('C_Rekap_Absen/edit_rekap_absen/' . $rekap->id_karyawan . '/' . $rekap->rekap_absen_bulan . '/' . $rekap->rekap_absen_tahun) ?>" class="btn btn-sm btn-warning mb-1">Ubah</a>
                                                    <button class="btn btn-sm btn-danger mb-1 delete" data-url="<?= base_url('C_Rekap_Absen/delete_rekap_absen/' . $rekap->id_karyawan . '/' . $rekap->rekap_absen_bulan . '/' . $rekap->rekap_absen_tahun) ?>">Hapus</button>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            <?php } ?>
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