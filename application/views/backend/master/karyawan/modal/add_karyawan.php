<!-- Modal -->
<div class="modal fade" id="addKaryawan" tabindex="-1" role="dialog" aria-labelledby="addKaryawanTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Karyawan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open('C_Karyawan/add_karyawan'); ?>
                <div class="form-group">
                    <label for="nik_karyawan">NIK Karyawan:</label>
                    <input type="text" class="form-control" id="nik_karyawan" name="nik_karyawan" autocomplete="off"
                        value="<?php echo set_value('nik_karyawan'); ?>">
                    <?php echo form_error('nik_karyawan', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="nama_karyawan">Nama Karyawan:</label>
                    <input type="text" class="form-control" id="nama_karyawan" name="nama_karyawan" autocomplete="off"
                        value="<?php echo set_value('nama_karyawan'); ?>">
                    <?php echo form_error('nama_karyawan', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="tanggal_masuk">Tanggal Masuk Karyawan:</label>
                    <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk"
                        value="<?php echo set_value('tanggal_masuk'); ?>">
                    <?php echo form_error('tanggal_masuk', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin:</label>
                    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                        <option value="">Pilih Jenis Kelamin</option>
                        <?php foreach ($jenis_kelamin as $row) { ?>
                        <option value="<?php echo $row->id_jenis_kelamin ?>"><?php echo $row->jenis_kelamin_nama ?>
                        </option>
                        <?php } ?>
                    </select>
                    <?php echo form_error('jenis_kelamin', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="jabatan_karyawan">Jabatan Karyawan:</label>
                    <select class="form-control" id="jabatan_karyawan" name="jabatan_karyawan">
                        <option value="">Pilih Jabatan Karyawan</option>
                        <?php foreach ($jabatan as $row) { ?>
                        <option value="<?php echo $row->id_jabatan ?>"><?php echo $row->jabatan_nama ?>
                        </option>
                        <?php } ?>
                    </select>
                    <?php echo form_error('jabatan_karyawan', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="status_karyawan">Status Karyawan:</label>
                    <select class="form-control" id="status_karyawan" name="status_karyawan">
                        <option value="">Pilih Status Karyawan</option>
                        <?php foreach ($status_karyawan as $row) { ?>
                        <option value="<?php echo $row->id_status_karyawan ?>"><?php echo $row->status_karyawan_nama ?>
                        </option>
                        <?php } ?>
                    </select>
                    <?php echo form_error('status_karyawan', '<small class="text-danger">', '</small>'); ?>
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