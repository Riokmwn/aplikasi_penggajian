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
                                    <label for="id_karyawan">Nomer Karyawan:</label>
                                    <input <?= $method=='edit' ? 'readonly' : '' ?> type="number" class="form-control" id="id_karyawan" placeholder="Nomer Karyawan"
                                        name="id_karyawan" value="<?php echo $karyawan->id_karyawan ?? NULL ?>">
                                    <?php echo form_error('id_karyawan', '<small class="text-danger">', '</small>'); ?>
                                </div>

                                <div class="form-group">
                                    <label for="nama_karyawan">Nama Karyawan:</label>
                                    <input type="text" class="form-control" id="nama_karyawan" placeholder="Nama Karyawan"
                                        name="nama_karyawan" value="<?php echo $karyawan->nama_karyawan ?? NULL ?>">
                                    <?php echo form_error('nama_karyawan', '<small class="text-danger">', '</small>'); ?>
                                </div>

                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control" id="email" placeholder="Email"
                                        name="email" value="<?php echo $karyawan->email ?? NULL ?>">
                                    <?php echo form_error('email', '<small class="text-danger">', '</small>'); ?>
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

                                <div class="form-group">
                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                                        <option value="">Pilih Jenis Kelamin</option>
                                        <option value="L"
                                            <?php echo (isset($karyawan->jenis_kelamin) && $karyawan->jenis_kelamin == 'L') ? 'selected' : '' ?>>
                                            Laki-laki
                                        </option>
                                        <option value="P"
                                            <?php echo (isset($karyawan->jenis_kelamin) && $karyawan->jenis_kelamin == 'P') ? 'selected' : '' ?>>
                                            Perempuan
                                        </option>
                                    </select>
                                    <?php echo form_error('jenis_kelamin', '<small class="text-danger">', '</small>'); ?>
                                </div>

                                <div class="form-group">
                                    <label for="alamat">Alamat:</label>
                                    <textarea id="alamat" name="alamat" class="form-control" cols="30" rows="10"><?php echo $karyawan->alamat ?? NULL ?></textarea>
                                    <?php echo form_error('alamat', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                
                                <div class="form-group">
                                    <label for="no_hp">No. HP:</label>
                                    <input type="text" class="form-control" id="no_hp" placeholder="No. HP"
                                        name="no_hp" value="<?php echo $karyawan->no_hp ?? NULL ?>">
                                    <?php echo form_error('no_hp', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button id="back-button" data-url="<?= base_url('KaryawanController') ?>"
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