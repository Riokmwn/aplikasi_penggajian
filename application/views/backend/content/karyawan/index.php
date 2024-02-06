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
            <!-- Button trigger modal -->
            <a href="<?= base_url('KaryawanController/formPage/add') ?>" class="btn btn-primary">
                Tambah Data <?= $judul ?>
            </a>

            <!-- Search Button -->
            <form class="mt-3" method="GET">
                <div class="input-group mb-3">
                    <input type="text" name="search" class="form-control" placeholder="Search..." value="<?= $_GET ? $_GET['search'] : '' ?>">
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
                <?php if($this->session->flashdata('msg')){ ?>
                <div class="col-md-12">
                    <div class="alert alert-success" role="alert">
                        <?php echo $this->session->flashdata('msg'); ?>
                    </div>
                </div>
                <?php } ?>
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
                            $Tingkat = array_slice($karyawan, $offset, $per_page);
                            ?>

                            <?php if (empty($Tingkat)) { ?>
                            <p>Data Belum Ada</p>
                            <?php } else { ?>
                            <table class="table table-bordered table-striped text-center">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>No. Karyawan</th>
                                        <th>Karyawan</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Posisi</th>
                                        <th>Alamat</th>
                                        <th>No. HP</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $no = 1;
                                        foreach ($Tingkat as $j) { ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $j->id_karyawan; ?></td>
                                        <td><?= $j->nama_karyawan; ?></td>
                                        <td><?= $j->username; ?></td>
                                        <td><?= $j->email; ?></td>
                                        <td><?= $j->jenis_kelamin; ?></td>
                                        <td><?= $j->nama_posisi; ?></td>
                                        <td><?= $j->alamat; ?></td>
                                        <td><?= $j->no_hp; ?></td>
                                        <td>
                                            <a href="<?= base_url('KaryawanController/formPage/edit/' . $j->id_karyawan) ?>"
                                                class="btn btn-sm btn-warning">Ubah</a>
                                            <button class="btn btn-sm btn-danger delete"
                                                data-url="<?= base_url('KaryawanController/delete/' . $j->id_karyawan) ?>">Hapus</button>
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