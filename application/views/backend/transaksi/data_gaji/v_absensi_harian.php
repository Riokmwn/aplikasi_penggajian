<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Rekapitulasi Absensi Karyawan</h1>
                </div>
            </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <form action="" method="POST">
                            <input type="hidden" name="id_karyawan"  value="<?= $id_karyawan ?>">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Hadir</th>
                                        <th>Jam Masuk</th>
                                        <th>Jam Keluar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($tanggal as $key => $value) { ?>
                                        <tr>
                                            <td><?= $value['day'].', '.$value['date'].' '.$value['month'].' '.$value['year'] ?></td>
                                            <?php if ($value['week'] != '0' && $value['week'] != '1') { ?>
                                                <td>
                                                    <input type="checkbox" name="data[<?= $value['date_full'] ?>][check]">
                                                </td>
                                                <td>
                                                    <input type="time" value="08:00:00" name="data[<?= $value['date_full'] ?>][masuk]">
                                                </td>
                                                <td>
                                                    <input type="time" value="17:00:00" name="data[<?= $value['date_full'] ?>][keluar]">
                                                </td>
                                            <?php } else { ?>
                                                <td colspan="3"></td>    
                                            <?php } ?>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
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