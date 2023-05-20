<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Master</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <?php if ($this->session->userdata('username') == 'admin') : ?>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3 style="opacity: 0;">150</h3>
                            <p>Data User</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-android-person"></i>
                        </div>
                        <a href="<?= base_url('C_Master/data_user') ?>" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <?php endif ?>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3 style="opacity: 0;">53</h3>

                            <p>Data Karyawan</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-android-people"></i>
                        </div>
                        <a href="<?= base_url('C_Master/data_karyawan') ?>" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3 style="opacity: 0;">44</h3>

                            <p>Data Jabatan</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-man"></i>
                        </div>
                        <a href="<?= base_url('C_Master/data_jabatan') ?>" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->