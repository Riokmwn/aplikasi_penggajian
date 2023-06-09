<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data BPJS</h1>
                </div>
            </div>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addBpjs">
                Tambah BPJS
            </button>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data BPJS</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <?php if (empty($data_bpjs)) { ?>
                                <p>Data Belum Ada</p>
                            <?php } else { ?>
                                <table class="table table-bordered table-striped text-center">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kelas</th>
                                            <th>Biaya</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($data_bpjs as $dbp) { ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $dbp->bpjs_kelas; ?></td>
                                                <td>Rp. <?= number_format($dbp->bpjs_biaya); ?></td>
                                                <td>
                                                    <a href="<?= base_url('C_Bpjs/edit_bpjs/' . $dbp->id_bpjs) ?>" class="btn btn-sm btn-warning">Ubah</a>
                                                    <button class="btn btn-sm btn-danger delete" data-url="<?= base_url('C_Bpjs/delete_bpjs/' . $dbp->id_bpjs) ?>">Hapus</button>
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

<?php
$this->load->view('backend/master/bpjs/modal/add_bpjs');
?>