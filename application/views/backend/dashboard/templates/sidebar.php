<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('C_Auth/logout') ?>" role="button">
                    <i class="fas fa-sign-out-alt"></i>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="#" class="brand-link">
            <img src="<?= base_url('assets/backend/') ?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
                class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">AdminLTE 3</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3"
                style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
                <?php
                $username = $this->session->userdata('username');
                $user = $this->M_User->get_user($username);
                ?>

                <div class="info">
                    <a href="<?= base_url('C_User/edit_account/' . $user->id_users) ?>"
                        class="d-block"><?= $user->users_name ?></a>
                    <!-- <input type="hidden" class="form-control" id="id_users" placeholder="ID User" name="id_users" value="<?= $user->id_users ?>"> -->
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <a href="<?= base_url('C_Dashboard') ?>" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <?php if ($_SESSION['role_id'] == 1) { ?>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-user-friends"></i>
                                <p>
                                    Data Master
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <?php if ($this->session->userdata('username') == 'admin') : ?>
                                <li class="nav-item">
                                    <a href="<?= base_url('C_User/data_user') ?>" class="nav-link">
                                        <p>Data User</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('C_Bpjs/data_bpjs') ?>" class="nav-link">
                                        <p>Data BPJS</p>
                                    </a>
                                </li>
                                <?php endif ?>
                                <li class="nav-item">
                                    <a href="<?= base_url('C_Karyawan/data_karyawan') ?>" class="nav-link">
                                        <p>Data Karyawan</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('C_Jabatan/data_jabatan') ?>" class="nav-link">
                                        <p>Data Jabatan</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    <?php } ?>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-money-bill-wave"></i>
                            <p>
                                Transaksi
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= base_url('C_Rekap_Absen/data_rekap_absen') ?>" class="nav-link">
                                    <p>Rekap Absen</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('C_Data_Gaji/data_gaji') ?>" class="nav-link">
                                    <p>Data Gaji</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-paperclip"></i>
                            <p>
                                Laporan
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= base_url('C_Laporan_Gaji/data_laporan_gaji') ?>" class="nav-link">
                                    <p>Laporan Gaji</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('C_Slip_Gaji/data_slip_gaji') ?>" class="nav-link">
                                    <p>Slip Gaji</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-cog"></i>
                            <p>
                                Utility
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= base_url('C_Auth/ganti_password') ?>" class="nav-link">
                                    <p>Ubah Password</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('C_Auth/logout') ?>" class="nav-link">
                                    <p>Keluar</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>