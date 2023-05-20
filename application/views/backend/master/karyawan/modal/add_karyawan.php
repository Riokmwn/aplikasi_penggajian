<!-- Modal -->
<div class="modal fade" id="addKaryawan" tabindex="-1" role="dialog" aria-labelledby="addKaryawanTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Akun Karyawan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo validation_errors(); ?>
                <?php echo form_open('C_Master/add_karyawan'); ?>
                <div class="form-group">
                    <label for="nik_karyawan">NIK Karyawan</label>
                    <input type="text" class="form-control" id="nik_karyawan" name="nik_karyawan" autocomplete="off"
                        value="<?php echo set_value('nik_karyawan'); ?>">
                </div>
                <div class="form-group">
                    <label for="nama_karyawan">Nama Karyawan</label>
                    <input type="text" class="form-control" id="nama_karyawan" name="nama_karyawan" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="tanggal_masuk">Tanggal Masuk Karyawan</label>
                    <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <input type="date" class="form-control" id="jenis_kelamin" name="jenis_kelamin" autocomplete="off">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah Akun Karyawan</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>