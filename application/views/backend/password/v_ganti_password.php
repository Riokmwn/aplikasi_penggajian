<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Ganti Password</h1>
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
                            <h3 class="card-title">Form Ganti Password</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="<?= base_url('C_Auth/ganti_password') ?>" method="post">

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="password1">Password Baru:</label>
                                    <input type="password" class="form-control" id="password1" placeholder="Password Baru" name="password1">
                                    <?php echo form_error('password1', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="password2">Ulangi Password Baru:</label>
                                    <input type="password" class="form-control" id="password2" placeholder="Ulangi Password Baru" name="password2">
                                    <?php echo form_error('password2', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
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