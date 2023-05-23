<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Karyawan</h1>
                </div>
            </div>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addKaryawan">
                Tambah Karyawan
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
                            <h3 class="card-title">Data Karyawan</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <?php if (empty($karyawan)) { ?>
                            <p>Data Belum Ada</p>
                            <?php } else { ?>
                            <table class="table table-bordered table-striped text-center">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nik Karyawan</th>
                                        <th>Nama Karyawan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $no = 1;
                                        foreach ($karyawan as $k) { ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $k->nik_karyawan; ?></td>
                                        <td><?= $k->karyawan_nama; ?></td>
                                        <td>
                                            <button data-toggle="modal"
                                                data-target="#detailKaryawan<?= $k->id_karyawan ?>"
                                                class="btn btn-sm btn-success">Detail</button>
                                            <a href="<?= base_url('C_Karyawan/edit_karyawan/' . $k->id_karyawan) ?>"
                                                class="btn btn-sm btn-warning">Ubah</a>
                                            <button class="btn btn-sm btn-danger delete"
                                                data-url="<?= base_url('C_Karyawan/delete_karyawan/' . $k->id_karyawan) ?>">Hapus</button>
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
$this->load->view('backend/master/karyawan/modal/add_karyawan');
$this->load->view('backend/master/karyawan/modal/detail_karyawan');
?>