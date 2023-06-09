<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Absen Karyawan</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <select class="form-control" id="bulan" name="bulan">
                            <option value="">Pilih Bulan:</option>
                            <?php
                            $bulan = array(
                                'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
                            );
                            foreach ($bulan as $row) { ?>
                                <option value="<?php echo $row ?>">
                                    <?php echo $row ?>
                                </option>
                            <?php } ?>
                        </select>
                        <?php echo form_error('bulan', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <select class="form-control" id="tahun" name="tahun">
                            <option value="">Pilih Tahun:</option>
                            <?php
                            $current_year = date('Y');
                            for ($i = 2020; $i <= $current_year; $i++) { ?>
                                <option value="<?php echo $i ?>">
                                    <?php echo $i ?>
                                </option>
                            <?php } ?>
                        </select>
                        <?php echo form_error('tahun', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <button id="search_absen" type="button" class="btn btn-success">
                        Lihat Rekap Absen
                    </button>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <a href="<?= base_url('C_Rekap_Absen/add_rekap_absen') ?>" type="button" class="btn btn-primary float-right">
                        Tambah Rekap Absen
                    </a>
                </div>
            </div>

            <!-- Search Button -->
            <form class="mt-3" method="GET" action="<?= site_url('C_Rekap_Absen/data_rekap_absen') ?>">
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
                            <h3 class="card-title">Data Absen Karyawan</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <?php
                            // Mengatur jumlah data per halaman
                            $per_page = 20;

                            // Menghitung jumlah total halaman
                            $total_pages = ceil(count($rekap_absen) / $per_page);

                            // Mengambil halaman saat ini dari URL
                            $current_page = isset($_GET['page']) ? $_GET['page'] : 1;

                            // Menghitung offset (data awal pada halaman saat ini)
                            $offset = ($current_page - 1) * $per_page;

                            // Mengambil data siswa sesuai dengan halaman saat ini
                            $Rekap = array_slice($rekap_absen, $offset, $per_page);
                            ?>

                            <?php if (empty($Rekap)) { ?>
                                <p>Data Belum Ada</p>
                            <?php } else { ?>
                                <div class="table-responsive">

                                    <table class="table table-bordered table-striped text-center">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nik Karyawan</th>
                                                <th>Nama Karyawan</th>
                                                <th>Jabatan Karyawan</th>
                                                <th>Bulan</th>
                                                <th>Tahun</th>
                                                <th>Hadir</th>
                                                <th>Telat</th>
                                                <th>Izin</th>
                                                <th>Sakit</th>
                                                <th>Tidak Hadir</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            // $no = 1;
                                            $start_number = ($current_page - 1) * $per_page + 1;
                                            foreach ($Rekap as $rekap) { ?>
                                                <tr>
                                                    <td><?= $start_number++; ?></td>
                                                    <td><?= $rekap->nik_karyawan; ?></td>
                                                    <td><?= $rekap->karyawan_nama; ?></td>
                                                    <td><?= $rekap->jabatan_nama; ?></td>
                                                    <td><?= $rekap->rekap_absen_bulan; ?></td>
                                                    <td><?= $rekap->rekap_absen_tahun; ?></td>
                                                    <td><?= $rekap->rekap_absen_hadir; ?></td>
                                                    <td><?= $rekap->rekap_absen_telat; ?></td>
                                                    <td><?= $rekap->rekap_absen_izin; ?></td>
                                                    <td><?= $rekap->rekap_absen_sakit; ?></td>
                                                    <td><?= $rekap->rekap_absen_tidak_hadir; ?></td>
                                                    <td>
                                                        <a href="<?= base_url('C_Rekap_Absen/edit_rekap_absen/' . $rekap->id_karyawan . '/' . $rekap->rekap_absen_bulan . '/' . $rekap->rekap_absen_tahun) ?>" class="btn btn-sm btn-warning mb-1">Ubah</a>
                                                        <button class="btn btn-sm btn-danger mb-1 delete" data-url="<?= base_url('C_Rekap_Absen/delete_rekap_absen/' . $rekap->id_karyawan . '/' . $rekap->rekap_absen_bulan . '/' . $rekap->rekap_absen_tahun) ?>">Hapus</button>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                <?php } ?>
                                </div>
                        </div>
                        <!-- /.card-body -->
                        <!-- Pagination -->
                        <nav>
                            <ul class="pagination justify-content-center">
                                <li class="page-item <?= ($current_page == 1) ? 'disabled' : '' ?>">
                                    <a class="page-link" href="<?= base_url('C_Rekap_Absen/data_rekap_absen/index?page=' . ($current_page - 1)) ?>">Previous</a>
                                </li>
                                <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
                                    <li class="page-item <?= ($current_page == $i) ? 'active' : '' ?>">
                                        <a class="page-link" href="<?= base_url('C_Rekap_Absen/data_rekap_absen/index?page=' . $i) ?>">
                                            <?= $i ?>
                                        </a>
                                    </li>
                                <?php } ?>
                                <li class="page-item <?= ($current_page == $total_pages) ? 'disabled' : '' ?>">
                                    <a class="page-link" href="<?= base_url('C_Rekap_Absen/data_rekap_absen/index?page=' . ($current_page + 1)) ?>">Next</a>
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