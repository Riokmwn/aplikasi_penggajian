<!-- Modal -->
<div class="modal fade" id="addJabatan" tabindex="-1" role="dialog" aria-labelledby="addJabatanTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Jabatan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open('C_Jabatan/add_jabatan'); ?>
                <div class="form-group">
                    <label for="jabatan_nama">Jabatan:</label>
                    <input type="text" class="form-control" id="jabatan_nama" name="jabatan_nama" autocomplete="off"
                        value="<?php echo set_value('jabatan_nama'); ?>">
                    <?php echo form_error('jabatan_nama', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="gaji_harian">Gaji Harian:</label>
                    <input type="text" class="form-control" id="gaji_harian" name="gaji_harian" autocomplete="off"
                        onkeyup="formatNumber(this)" value="<?php echo set_value('gaji_harian'); ?>">
                    <?php echo form_error('gaji_harian', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="uang_makan">Uang Makan Harian:</label>
                    <input type="text" class="form-control" id="uang_makan" name="uang_makan" autocomplete="off"
                        onkeyup="formatNumber(this)" value="<?php echo set_value('uang_makan'); ?>">
                    <?php echo form_error('uang_makan', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="transportasi">Transportasi Harian:</label>
                    <input type="text" class="form-control" id="transportasi" name="transportasi" autocomplete="off"
                        onkeyup="formatNumber(this)" value="<?php echo set_value('transportasi'); ?>">
                    <?php echo form_error('transportasi', '<small class="text-danger">', '</small>'); ?>
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