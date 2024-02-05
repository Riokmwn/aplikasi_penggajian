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
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Pengaturan</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered table-striped text-center">
                                <thead>
                                    <tr>
                                        <th>Jam Masuk</th>
                                        <th>Toleransi Menit Masuk</th>
                                        <th>Jam Keluar</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $no = 1;
                                        foreach ($pengaturan as $j) { ?>
                                    <tr>
                                        <td><?= $j->jam_masuk; ?></td>
                                        <td><?= $j->menit_masuk_toleransi; ?></td>
                                        <td><?= $j->jam_keluar; ?></td>
                                        <td>
                                            <a href="<?= base_url('PengaturanController/formPage/edit/') ?>"
                                                class="btn btn-sm btn-warning">Ubah</a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
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