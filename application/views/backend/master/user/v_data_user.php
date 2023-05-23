<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data User</h1>
                </div>
            </div>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">
                Tambah Akun
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
                            <h3 class="card-title">Data User</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <?php if (empty($users)) { ?>
                            <p>Data Belum Ada</p>
                            <?php } else { ?>
                            <table class="table table-bordered table-striped text-center">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Username</th>
                                        <th>Nama Pengguna</th>
                                        <th>Password</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $no = 1;
                                        foreach ($users as $user) { ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $user->username; ?></td>
                                        <td><?= $user->users_name; ?></td>
                                        <td>
                                            <button class="btn btn-sm btn-success reset-password"
                                                data-url="<?= base_url('C_Auth/reset_password/' . $user->id_users) ?>">Reset
                                                Password</button>
                                        </td>
                                        <td>
                                            <a href="<?= base_url('C_User/edit_user/' . $user->id_users) ?>"
                                                class="btn btn-sm btn-warning">Ubah</a>
                                            <button class="btn btn-sm btn-danger delete"
                                                data-url="<?= base_url('C_User/delete_users/' . $user->id_users) ?>">Hapus</button>
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
$this->load->view('backend/master/user/modal/add_modal');
?>