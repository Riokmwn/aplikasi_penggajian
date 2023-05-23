<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Ubah Akun</h1>
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
                            <h3 class="card-title">Form Ubah Akun</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="<?= base_url('C_User/edit_user/' . $id_users) ?>" method="post">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="username">Username:</label>
                                    <input type="text" class="form-control" id="username" placeholder="Username"
                                        name="username" value="<?php echo $user->username ?>">
                                    <!-- style=" height: 260px; width: 609px;" -->
                                    <?php echo form_error('username', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="nama_pengguna">Nama Pengguna:</label>
                                    <input type="text" class="form-control" id="nama_pengguna"
                                        placeholder="Nama Pengguna" name="nama_pengguna"
                                        value="<?php echo $user->users_name ?>">
                                    <?php echo form_error('nama_pengguna', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <input type="hidden" class="form-control" id="id_users" placeholder="ID Bantuan"
                                    name="id_users" value="<?php echo $id_users ?>">
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button id="back-button" data-url="<?= base_url('C_User/data_user') ?>"
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