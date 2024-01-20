<div class="page">
    <div class="container">
        <div class="d-flex justify-content-end mt-2">
            <button id="print_page_now" class="btn btn-info hidden_print"><i class="fas fa-print mr-2"></i>Print</button>
        </div>
        <!-- Logo perusahaan dan bagian hero section -->
        <div class="text-center mt-lg-5">
            <img src="<?= base_url('assets/img/logo.png') ?>" style="width: 800px; height: 250px;" alt="Logo Perusahaan" class="logo-img">
            <h1 class="mt-3">PT.HITTACINDO Career</h1>
            <h2>Slip Gaji Karyawan</>
                <hr style="border: 2px solid black">
        </div>

        <br>
        <?php
        if (empty($slip_gaji)) { ?>
            <p>Data Belum Ada</p>
        <?php } else { ?>
            <div class="col-4">
                <div class="row">
                    <p class="col">Nama</p>
                    <p class="col-auto">:</p>
                    <p class="col"><?= $slip_gaji->karyawan_nama; ?></p>
                </div>
                <div class="row">
                    <p class="col">Jabatan</p>
                    <p class="col-auto">:</p>
                    <p class="col"><?= $slip_gaji->jabatan_nama; ?></p>
                </div>
                <div class="row">
                    <p class="col">Bulan</p>
                    <p class="col-auto">:</p>
                    <p class="col"><?= $slip_gaji->rekap_gaji_bulan; ?></p>
                </div>
                <div class="row">
                    <p class="col">Tahun</p>
                    <p class="col-auto">:</p>
                    <p class="col"><?= $slip_gaji->rekap_gaji_tahun; ?></p>
                </div>
            </div>

            <table style="border: 2px solid black; border-collapse: collapse; width: 100%;" class="text-center">
                <thead>
                    <tr>
                        <th style="border: 2px solid black; padding: 10px;">No</th>
                        <th style="border: 2px solid black; padding: 10px;">Keterangan</th>
                        <th style="border: 2px solid black; padding: 10px;">Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="border: 2px solid black; padding: 10px;">1</td>
                        <td style="border: 2px solid black; padding: 10px;">Gaji Pokok</td>
                        <td style="border: 2px solid black; padding: 10px;">Rp.
                            <?= number_format($slip_gaji->rekap_gaji_pokok); ?></td>
                    </tr>
                    <tr>
                        <td style="border: 2px solid black; padding: 10px;">2</td>
                        <td style="border: 2px solid black; padding: 10px;">Uang Makan</td>
                        <td style="border: 2px solid black; padding: 10px;">Rp.
                            <?= number_format($slip_gaji->rekap_gaji_makan); ?></td>
                    </tr>
                    <tr>
                        <td style="border: 2px solid black; padding: 10px;">3</td>
                        <td style="border: 2px solid black; padding: 10px;">Transportasi</td>
                        <td style="border: 2px solid black; padding: 10px;">Rp.
                            <?= number_format($slip_gaji->rekap_gaji_transportasi); ?></td>
                    </tr>
                    <tr>
                        <td style="border: 2px solid black; padding: 10px;">4</td>
                        <td style="border: 2px solid black; padding: 10px;">Potongan</td>
                        <td style="border: 2px solid black; padding: 10px;">Rp.
                            <?= number_format($slip_gaji->rekap_gaji_potongan); ?></td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td style="border: 2px solid black; padding: 10px;" colspan="2">
                            <div style="text-align: center;" class="font-weight-bold">TOTAL</div>
                        </td>
                        <td style="border: 2px solid black; padding: 10px;" class="font-weight-bold">
                            Rp. <?= number_format($slip_gaji->rekap_gaji_total); ?></td>
                    </tr>
                </tfoot>
            </table>
        <?php } ?>

        <br><br>
        <!-- Bagian tempat, bulan, tahun, tanda tangan, dan nama bos perusahaan -->
        <div class="footer">
            <div class="float-right">
                <p>Tangerang, <span><?= date('d F Y'); ?></span></p>
                <p>Direktur,</p>
            </div>
            <div class="clearfix"></div>
            <div class="signature-space" style="width: 100px; height: 100px;"></div>
            <div class="float-right">
                <p style="border-bottom: 3px solid; width: 200px;"></p>
            </div>
        </div>
    </div>
</div>