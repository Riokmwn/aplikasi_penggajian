<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Jabatan</h1>
                </div>
            </div>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addJabatan">
                Tambah Jabatan
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
                            <h3 class="card-title">Data Jabatan</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <?php if (empty($jabatan)) { ?>
                                <p>Data Belum Ada</p>
                            <?php } else { ?>
                                <table class="table table-bordered table-striped text-center">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Jabatan</th>
                                            <th>Gaji Pokok</th>
                                            <th>Uang Makan</th>
                                            <th>Transportasi</th>
                                            <th>Total Gaji</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($jabatan as $j) { ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $j->jabatan_nama; ?></td>
                                                <td>Rp. <?= number_format($j->jabatan_gaji_pokok); ?></td>
                                                <td>Rp. <?= number_format($j->jabatan_gaji_makan); ?></td>
                                                <td>Rp. <?= number_format($j->jabatan_gaji_transportasi); ?></td>
                                                <td>Rp. <?= number_format($j->jabatan_total_gaji); ?></td>
                                                <td>
                                                    <a href="<?= base_url('C_Jabatan/edit_jabatan/' . $j->id_jabatan) ?>" class="btn btn-sm btn-warning">Ubah</a>
                                                    <button class="btn btn-sm btn-danger delete" data-url="<?= base_url('C_Jabatan/delete_jabatan/' . $j->id_jabatan) ?>">Hapus</button>
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
$this->load->view('backend/master/jabatan/modal/add_jabatan');
?>