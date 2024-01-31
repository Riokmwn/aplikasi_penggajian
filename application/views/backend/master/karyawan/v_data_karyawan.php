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

            <!-- Search Button -->
            <form class="mt-3" method="GET" action="<?= site_url('C_Karyawan/data_karyawan') ?>">
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
                            <h3 class="card-title">Data Karyawan</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <?php
                            // Mengatur jumlah data per halaman
                            $per_page = 10;

                            // Menghitung jumlah total halaman
                            $total_pages = ceil(count($karyawan) / $per_page);

                            // Mengambil halaman saat ini dari URL
                            $current_page = isset($_GET['page']) ? $_GET['page'] : 1;

                            // Menghitung offset (data awal pada halaman saat ini)
                            $offset = ($current_page - 1) * $per_page;

                            // Mengambil data siswa sesuai dengan halaman saat ini
                            $Pegawai = array_slice($karyawan, $offset, $per_page);
                            ?>

                            <?php if (empty($Pegawai)) { ?>
                            <p>Data Belum Ada</p>
                            <?php } else { ?>
                            <table class="table table-bordered table-striped text-center">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nik Karyawan</th>
                                        <th>Nama Karyawan</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Jabatan Karyawan</th>
                                        <th>Status Karyawan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        // $no = 1;
                                        $start_number = ($current_page - 1) * $per_page + 1;
                                        foreach ($Pegawai as $k) { ?>
                                    <tr>
                                        <!-- <td><?= $no++; ?></td> -->
                                        <td><?= $start_number++; ?></td>
                                        <td><?= $k->nik_karyawan; ?></td>
                                        <td><?= $k->karyawan_nama; ?></td>
                                        <td><?= $k->jenis_kelamin_nama; ?></td>
                                        <td><?= $k->jabatan_nama; ?></td>
                                        <td><?= $k->status_karyawan_nama; ?></td>
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

                        <!-- Pagination -->
                        <nav>
                            <ul class="pagination justify-content-center">
                                <li class="page-item <?= ($current_page == 1) ? 'disabled' : '' ?>">
                                    <a class="page-link"
                                        href="<?= base_url('C_Karyawan/data_karyawan/index?page=' . ($current_page - 1)) ?>">Previous</a>
                                </li>
                                <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
                                <li class="page-item <?= ($current_page == $i) ? 'active' : '' ?>">
                                    <a class="page-link"
                                        href="<?= base_url('C_Karyawan/data_karyawan/index?page=' . $i) ?>">
                                        <?= $i ?>
                                    </a>
                                </li>
                                <?php } ?>
                                <li class="page-item <?= ($current_page == $total_pages) ? 'disabled' : '' ?>">
                                    <a class="page-link"
                                        href="<?= base_url('C_Karyawan/data_karyawan/index?page=' . ($current_page + 1)) ?>">Next</a>
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
$this->load->view('backend/master/karyawan/modal/add_karyawan');
$this->load->view('backend/master/karyawan/modal/detail_karyawan');
?>