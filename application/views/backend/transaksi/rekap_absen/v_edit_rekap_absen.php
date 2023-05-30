<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Ubah Rekap Absen Karyawan</h1>
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
                            <h3 class="card-title">Form Ubah Rekap Absen Karyawan</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form
                            action="<?= base_url('C_Rekap_Absen/edit_rekap_absen/' . $id_karyawan . '/' . $rekap_absen_bulan . '/' . $rekap_absen_tahun) ?>"
                            method="post">
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="bulan">Bulan:</label>
                                        <input type="text" class="form-control" id="bulan" name="bulan" readonly
                                            value="<?php echo $rekap_absen->rekap_absen_bulan ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="tahun">Tahun:</label>
                                        <input type="text" class="form-control" id="tahun" name="tahun" readonly
                                            value="<?php echo $rekap_absen->rekap_absen_tahun ?>">
                                    </div>
                                    <label for="nik_karyawan">NIK Karyawan:</label>
                                    <input type="text" class="form-control" id="nik_karyawan" placeholder="NIK Karyawan"
                                        name="nik_karyawan" readonly value="<?php echo $rekap_absen->nik_karyawan ?>">
                                    <!-- style=" height: 260px; width: 609px;" -->
                                    <?php echo form_error('nik_karyawan', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="nama_karyawan">Nama Karyawan:</label>
                                    <input type="text" class="form-control" id="nama_karyawan"
                                        placeholder="Nama Karyawan" name="nama_karyawan" readonly
                                        value="<?php echo $rekap_absen->karyawan_nama ?>">
                                    <?php echo form_error('nama_karyawan', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="jabatan">Jabatan:</label>
                                    <input type="text" class="form-control" id="jabatan" name="jabatan" readonly
                                        value="<?php echo $rekap_absen->jabatan_nama ?>">
                                </div>
                                <div class="form-group">
                                    <label for="hadir">Absen Hadir:</label>
                                    <input type="text" class="form-control" id="hadir" name="hadir"
                                        value="<?php echo $rekap_absen->rekap_absen_hadir ?>">
                                </div>
                                <div class="form-group">
                                    <label for="telat">Absen Telat:</label>
                                    <input type="text" class="form-control" id="telat" name="telat"
                                        value="<?php echo $rekap_absen->rekap_absen_telat ?>">
                                </div>
                                <div class="form-group">
                                    <label for="izin">Absen Izin:</label>
                                    <input type="text" class="form-control" id="izin" name="izin"
                                        value="<?php echo $rekap_absen->rekap_absen_izin ?>">
                                </div>
                                <div class="form-group">
                                    <label for="sakit">Absen Sakit:</label>
                                    <input type="text" class="form-control" id="sakit" name="sakit"
                                        value="<?php echo $rekap_absen->rekap_absen_sakit ?>">
                                </div>
                                <div class="form-group">
                                    <label for="tidak_hadir">Absen Tidak Hadir:</label>
                                    <input type="text" class="form-control" id="tidak_hadir" name="tidak_hadir"
                                        value="<?php echo $rekap_absen->rekap_absen_tidak_hadir ?>">
                                </div>
                                <input type="hidden" class="form-control" id="id_karyawan" placeholder="ID Karyawan"
                                    name="id_karyawan" value="<?php echo $id_karyawan ?>">
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button id="back-button" data-url="<?= base_url('C_Rekap_Absen/data_rekap_absen') ?>"
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