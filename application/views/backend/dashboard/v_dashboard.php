<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3><?= $jumlah_karyawan ?></h3>

                                <p>Jumlah Karyawan</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-android-people"></i>
                            </div>
                        </div>
                    </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?= $jumlah_posisi ?></h3>

                            <p>Posisi</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-cash"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 mb-4">
                                    <?php if ($_SESSION['role_id'] == 1){ ?>
                                    <h5 class="card-title">Jumlah Penalti Karyawan Bulan Ini</h5>
                                    <?php } else if ($_SESSION['role_id'] == 2) { ?>
                                    <h5 class="card-title">Jumlah Penalti Anda Bulan Ini</h5>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <table   table class="table">
                                        <thead class="thead-dark">
                                            <tr>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Jumlah Telat</th>
                                            <th scope="col">Jumlah Checkout Awal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($penalti_karyawan as $key => $value) { ?>
                                                <tr>
                                                    <td><?= $value->nama_karyawan ?></td>
                                                    <td><?= $value->parameter_telat ?></td>
                                                    <td><?= $value->parameter_checkout_awal ?></td>
                                                </tr>
                                            <?php }
                                                if (count($penalti_karyawan) < 1) { ?>
                                                    <tr>
                                                        <td colspan="3" class="text-center">Tidak ada data</td>
                                                    </tr>
                                                <?php }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->