<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>Admin</b>LTE</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Sign in to start your session</p>

            <?php echo $this->session->flashdata('pesan'); ?>

            <form action="<?= base_url('C_Auth') ?>" method="post">
                <div class="input-group">
                    <input type="username" class="form-control" placeholder="username" name="username"
                        value="<?php echo set_value('username'); ?>" autocomplete="off">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <?php echo form_error('username', '<small class="text-danger">', '</small>'); ?>

                <div class="input-group mt-3">
                    <input type="password" class="form-control" placeholder="password" name="password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <?php echo form_error('password', '<small class="text-danger">', '</small>'); ?>

                <div class="row mt-3">
                    <!-- /.col -->
                    <div class="col-md">
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->