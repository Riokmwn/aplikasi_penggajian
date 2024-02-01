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

            <!-- Search Button -->
            <form class="mt-3" method="GET" action="<?= site_url('C_Jabatan/data_jabatan') ?>">
                <div class="input-group mb-3">
                    <input type="text" name="search" class="form-control" placeholder="Search...">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-search"></i> Search
                        </button>
                    </div>
                </div>
            </form>
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
                            <?php
                            // Mengatur jumlah data per halaman
                            $per_page = 10;

                            // Menghitung jumlah total halaman
                            $total_pages = ceil(count($jabatan) / $per_page);

                            // Mengambil halaman saat ini dari URL
                            $current_page = isset($_GET['page']) ? $_GET['page'] : 1;

                            // Menghitung offset (data awal pada halaman saat ini)
                            $offset = ($current_page - 1) * $per_page;

                            // Mengambil data siswa sesuai dengan halaman saat ini
                            $Tingkat = array_slice($jabatan, $offset, $per_page);
                            ?>

                            <?php if (empty($Tingkat)) { ?>
                            <p>Data Belum Ada</p>
                            <?php } else { ?>
                            <table class="table table-bordered table-striped text-center">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Jabatan</th>
                                        <th>Gaji Harian</th>
                                        <th>Uang Makan Harian</th>
                                        <th>Transportasi Harian</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $no = 1;
                                        foreach ($Tingkat as $j) { ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $j->jabatan_nama; ?></td>
                                        <td>Rp. <?= number_format($j->jabatan_gaji_harian); ?></td>
                                        <td>Rp. <?= number_format($j->jabatan_gaji_makan); ?></td>
                                        <td>Rp. <?= number_format($j->jabatan_gaji_transportasi); ?></td>
                                        <td>
                                            <a href="<?= base_url('C_Jabatan/edit_jabatan/' . $j->id_jabatan) ?>"
                                                class="btn btn-sm btn-warning">Ubah</a>
                                            <button class="btn btn-sm btn-danger delete"
                                                data-url="<?= base_url('C_Jabatan/delete_jabatan/' . $j->id_jabatan) ?>">Hapus</button>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <?php } ?>
                        </div>
                        <!-- /.card-body -->

                        <!-- Pagination -->
                        <nav>
                            <ul class="pagination justify-content-center">
                                <li class="page-item <?= ($current_page == 1) ? 'disabled' : '' ?>">
                                    <a class="page-link"
                                        href="<?= base_url('C_Jabatan/data_jabatan/index?page=' . ($current_page - 1)) ?>">Previous</a>
                                </li>
                                <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
                                <li class="page-item <?= ($current_page == $i) ? 'active' : '' ?>">
                                    <a class="page-link"
                                        href="<?= base_url('C_Jabatan/data_jabatan/index?page=' . $i) ?>">
                                        <?= $i ?>
                                    </a>
                                </li>
                                <?php } ?>
                                <li class="page-item <?= ($current_page == $total_pages) ? 'disabled' : '' ?>">
                                    <a class="page-link"
                                        href="<?= base_url('C_Jabatan/data_jabatan/index?page=' . ($current_page + 1)) ?>">Next</a>
                                </li>
                            </ul>
                        </nav>

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