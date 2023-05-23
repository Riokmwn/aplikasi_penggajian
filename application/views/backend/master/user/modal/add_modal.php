<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Akun User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open('C_User/add_user'); ?>
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" id="username" name="username" autocomplete="off" value="<?php echo set_value('username'); ?>">
                    <?php echo form_error('username', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="nama_pengguna">Nama Pengguna:</label>
                    <input type="text" class="form-control" id="nama_pengguna" name="nama_pengguna" autocomplete="off">
                    <?php echo form_error('nama_pengguna', '<small class="text-danger">', '</small>'); ?>
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