<div class="page">
    <div class="container">
        <div class="d-flex justify-content-end mt-2">
            <button id="back-button" data-url="<?= base_url('C_Data_Gaji/data_gaji') ?>"
                class="btn btn-secondary hidden_print mr-2">Kembali</button>
            <button id="print_page_now" class="btn btn-info hidden_print"><i
                    class="fas fa-print mr-2"></i>Print</button>
        </div>
        <!-- Logo perusahaan dan bagian hero section -->
        <div class="text-center mt-lg-5">
            <img src="<?= base_url('assets/img/logo.png') ?>" style="width: 800px; height: 250px;" alt="Logo Perusahaan"
                class="logo-img">
            <h1 class="mt-3">PT LeMondial Career</h1>
            <h2>Daftar Gaji Karyawan</>
                <hr style="border: 2px solid black">
        </div>

        <?php
        if (!empty($rekap_gaji)) {
            $rekap = $rekap_gaji[0]; // Mengambil data pertama dari array $rekap_gaji
        ?>
        <br>
        <div>
            <p>Bulan : <?= $rekap->rekap_gaji_bulan; ?></p>
            <p>Tahun : <?= $rekap->rekap_gaji_tahun; ?></p>
        </div>

        <table style="border: 2px solid black; border-collapse: collapse; width: 100%;" class="text-center">
            <thead>
                <tr>
                    <th style="border: 2px solid black; padding: 10px;">No</th>
                    <th style="border: 2px solid black; padding: 10px;">NIK</th>
                    <th style="border: 2px solid black; padding: 10px;">Nama</th>
                    <th style="border: 2px solid black; padding: 10px;">Jabatan</th>
                    <th style="border: 2px solid black; padding: 10px;">Gaji Pokok</th>
                    <th style="border: 2px solid black; padding: 10px;">Uang Makan</th>
                    <th style="border: 2px solid black; padding: 10px;">Transportasi</th>
                    <th style="border: 2px solid black; padding: 10px;">Potongan</th>
                    <th style="border: 2px solid black; padding: 10px;">Total Gaji</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $no = 1;
                    foreach ($rekap_gaji as $rekap) { ?>
                <tr>
                    <td style="border: 2px solid black; padding: 10px;"><?= $no++; ?></td>
                    <td style="border: 2px solid black; padding: 10px;"><?= $rekap->nik_karyawan; ?></td>
                    <td style="border: 2px solid black; padding: 10px;"><?= $rekap->karyawan_nama; ?></td>
                    <td style="border: 2px solid black; padding: 10px;"><?= $rekap->jabatan_nama; ?></td>
                    <td style="border: 2px solid black; padding: 10px;">Rp.
                        <?= number_format(floatval($rekap->rekap_gaji_pokok)); ?></td>
                    <td style="border: 2px solid black; padding: 10px;">Rp.
                        <?= number_format(floatval($rekap->rekap_gaji_makan)); ?></td>
                    <td style="border: 2px solid black; padding: 10px;">Rp.
                        <?= number_format(floatval($rekap->rekap_gaji_transportasi)); ?></td>
                    <td style="border: 2px solid black; padding: 10px;">Rp.
                        <?= number_format(floatval($rekap->rekap_gaji_potongan)); ?></td>
                    <td style="border: 2px solid black; padding: 10px;">Rp.
                        <?= number_format(floatval($rekap->rekap_gaji_total)); ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>


        <?php } ?>

        <br><br>
        <!-- Bagian tempat, bulan, tahun, tanda tangan, dan nama bos perusahaan -->
        <div class="footer">
            <div class="float-right">
                <p>Tangerang, <span><?= date('d F Y'); ?></span></p>
                <p>Manager,</p>
            </div>
            <div class="clearfix"></div>
            <div class="signature-space" style="width: 100px; height: 100px;"></div>
            <div class="float-right">
                <p style="border-bottom: 3px solid; width: 200px;"></p>
            </div>
        </div>
    </div>
</div>