<!-- Modal -->
<div class="modal fade" id="addBpjs" tabindex="-1" role="dialog" aria-labelledby="addBpjsTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah BPJS</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open('C_Bpjs/add_bpjs'); ?>
                <div class="form-group">
                    <label for="bpjs_kelas">Kelas BPJS:</label>
                    <input type="text" class="form-control" id="bpjs_kelas" name="bpjs_kelas" autocomplete="off" value="<?php echo set_value('bpjs_kelas'); ?>">
                    <?php echo form_error('bpjs_kelas', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="bpjs_biaya">Biaya:</label>
                    <input type="text" class="form-control" id="bpjs_biaya" name="bpjs_biaya" autocomplete="off" onkeyup="formatNumber(this)" value="<?php echo set_value('bpjs_biaya'); ?>">
                    <?php echo form_error('bpjs_biaya', '<small class="text-danger">', '</small>'); ?>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah Data BPJS</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>