<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Ubah Karyawan</h1>
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
                            <h3 class="card-title">Form Ubah Karyawan</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="<?= base_url('C_Karyawan/edit_karyawan/' . $id_karyawan) ?>" method="post">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nik_karyawan">NIK Karyawan:</label>
                                    <input type="text" class="form-control" id="nik_karyawan" placeholder="NIK Karyawan"
                                        name="nik_karyawan" value="<?php echo $karyawan->nik_karyawan ?>">
                                    <!-- style=" height: 260px; width: 609px;" -->
                                    <?php echo form_error('nik_karyawan', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="nama_karyawan">Nama Karyawan:</label>
                                    <input type="text" class="form-control" id="nama_karyawan"
                                        placeholder="Nama Karyawan" name="nama_karyawan"
                                        value="<?php echo $karyawan->karyawan_nama ?>">
                                    <?php echo form_error('nama_karyawan', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_masuk">Tanggal Masuk Karyawan</label>
                                    <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk"
                                        value="<?php echo $karyawan->karyawan_tanggal_masuk ?>">
                                </div>
                                <div class="form-group">
                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                                        <option value="">Pilih Jenis Kelamin</option>
                                        <?php foreach ($jenis_kelamin as $row) { ?>
                                        <option value="<?php echo $row->id_jenis_kelamin ?>"
                                            <?php echo ($karyawan->jenis_kelamin_id == $row->id_jenis_kelamin) ? 'selected' : '' ?>>
                                            <?php echo $row->jenis_kelamin_nama ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="jabatan_karyawan">Jabatan Karyawan</label>
                                    <select class="form-control" id="jabatan_karyawan" name="jabatan_karyawan">
                                        <option value="">Pilih Jabatan Karyawan</option>
                                        <?php foreach ($jabatan as $row) { ?>
                                        <option value="<?php echo $row->id_jabatan ?>"
                                            <?php echo ($karyawan->jabatan_id == $row->id_jabatan) ? 'selected' : '' ?>>
                                            <?php echo $row->jabatan_nama ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="text" class="form-control" id="email"
                                        placeholder="Email" name="email"
                                        value="<?php echo $karyawan->email ?>">
                                    <?php echo form_error('email', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="status_karyawan">Status Karyawan</label>
                                    <select class="form-control" id="status_karyawan" name="status_karyawan">
                                        <option value="">Pilih Status Karyawan</option>
                                        <?php foreach ($status_karyawan as $row) { ?>
                                        <option value="<?php echo $row->id_status_karyawan ?>"
                                            <?php echo ($karyawan->status_karyawan_id == $row->id_status_karyawan) ? 'selected' : '' ?>>
                                            <?php echo $row->status_karyawan_nama ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <input type="hidden" class="form-control" id="id_karyawan" placeholder="ID Karyawan"
                                    name="id_karyawan" value="<?php echo $id_karyawan ?>">
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button id="back-button" data-url="<?= base_url('C_Karyawan/data_karyawan') ?>"
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