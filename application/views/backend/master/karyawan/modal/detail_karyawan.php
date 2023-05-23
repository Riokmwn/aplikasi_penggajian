<?php foreach ($karyawan as $k) { ?>
<!-- Modal -->
<div class="modal fade" id="detailKaryawan<?= $k->id_karyawan ?>" tabindex="-1" role="dialog"
    aria-labelledby="detailKaryawanTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Detail Karyawan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="nik_karyawan">NIK Karyawan:</label>
                    <input type="text" class="form-control" id="nik_karyawan" name="nik_karyawan"
                        value="<?php echo $k->nik_karyawan ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="nama_karyawan">Nama Karyawan:</label>
                    <input type="text" class="form-control" id="nama_karyawan" name="nama_karyawan"
                        value="<?php echo $k->karyawan_nama ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="tanggal_masuk">Tanggal Masuk Karyawan:</label>
                    <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk"
                        value="<?php echo $k->karyawan_tanggal_masuk ?>" readonly>
                </div>
                <div class=" form-group">
                    <label for="jenis_kelamin">Jenis Kelamin:</label>
                    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" disabled
                        style="appearance: none; -moz-appearance: none; -webkit-appearance: none; background-image: none !important;">
                        <option value="">Pilih Jenis Kelamin</option>
                        <?php foreach ($jenis_kelamin as $row) { ?>
                        <option value="<?php echo $row->id_jenis_kelamin ?>"
                            <?php echo ($k->jenis_kelamin_id == $row->id_jenis_kelamin) ? 'selected' : '' ?>>
                            <?php echo $row->jenis_kelamin_nama ?>
                        </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="jabatan_karyawan">Jabatan Karyawan:</label>
                    <select class="form-control" id="jabatan_karyawan" name="jabatan_karyawan" disabled
                        style="appearance: none; -moz-appearance: none; -webkit-appearance: none; background-image: none !important;">
                        <option value="">Pilih Jabatan Karyawan</option>
                        <?php foreach ($jabatan as $row) { ?>
                        <option value="<?php echo $row->id_jabatan ?>"
                            <?php echo ($k->jabatan_id == $row->id_jabatan) ? 'selected' : '' ?>>
                            <?php echo $row->jabatan_nama ?>
                        </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="status_karyawan">Status Karyawan:</label>
                    <select class="form-control" id="status_karyawan" name="status_karyawan" disabled
                        style="appearance: none; -moz-appearance: none; -webkit-appearance: none; background-image: none !important;">
                        <option value="">Pilih Status Karyawan</option>
                        <?php foreach ($status_karyawan as $row) { ?>
                        <option value="<?php echo $row->id_status_karyawan ?>"
                            <?php echo ($k->status_karyawan_id == $row->id_status_karyawan) ? 'selected' : '' ?>>
                            <?php echo $row->status_karyawan_nama ?>
                        </option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?php } ?>