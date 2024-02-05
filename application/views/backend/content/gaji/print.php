<div class="page">
    <div class="container">
        <div class="d-flex justify-content-end mt-2">
            <button id="print_page_now" class="btn btn-info hidden_print"><i class="fas fa-print mr-2"></i>Print</button>
        </div>
        <!-- Logo perusahaan dan bagian hero section -->
        <div class="text-center mt-lg-5">
            <img src="<?= base_url('assets/img/logo.png') ?>" style="width: 800px; height: 250px;" alt="Logo Perusahaan" class="logo-img">
            <h1 class="mt-3">PT.ANEKA HITTACINDO PRATAMA </h1>
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
                    <p class="col"><?= $slip_gaji->nama_karyawan; ?></p>
                </div>
                <div class="row">
                    <p class="col">Posisi</p>
                    <p class="col-auto">:</p>
                    <p class="col"><?= $slip_gaji->nama_posisi; ?></p>
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
                        <th style="border: 2px solid black; padding: 10px;">Elemen</th>
                        <th style="border: 2px solid black; padding: 10px;">Jumlah</th>
                        <th style="border: 2px solid black; padding: 10px;">Keterangan</th>
                        <th style="border: 2px solid black; padding: 10px;">Detail</th>
                        <th style="border: 2px solid black; padding: 10px;">Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td rowspan="4" style="border: 2px solid black; padding: 10px;">1</td>
                        <td rowspan="4" style="border: 2px solid black; padding: 10px;">Absensi</td>
                    </tr>
                    <tr>
                        <td rowspan="3" style="border: 2px solid black; padding: 10px;"><?= $slip_gaji->total_hari_masuk ?> hari </td>
                        <td style="border: 2px solid black; padding: 10px;">Bayaran Harian</td>
                        <td style="border: 2px solid black; padding: 10px;">Rp. <?= number_format($slip_gaji->bayaran_harian) ?></td>
                        <td style="border: 2px solid black; padding: 10px;">Rp. <?= number_format($slip_gaji->total_bayaran_harian) ?></td>
                    </tr>
                    <tr>
                        <td style="border: 2px solid black; padding: 10px;">Konsumsi Harian</td>
                        <td style="border: 2px solid black; padding: 10px;">Rp. <?= number_format($slip_gaji->bayaran_konsumsi_harian) ?></td>
                        <td style="border: 2px solid black; padding: 10px;">Rp.<?= number_format($slip_gaji->total_bayaran_konsumsi_harian) ?></td>
                    </tr>
                    <tr>
                        <td style="border: 2px solid black; padding: 10px;">Transport Harian</td>
                        <td style="border: 2px solid black; padding: 10px;">Rp. <?= number_format($slip_gaji->bayaran_transportasi_harian) ?></td>
                        <td style="border: 2px solid black; padding: 10px;"> Rp.<?= number_format($slip_gaji->total_bayaran_transportasi_harian) ?></td>
                    </tr>
                    <tr>
                        <td style="border: 2px solid black; padding: 10px;">2</td>
                        <td style="border: 2px solid black; padding: 10px;">Lembur</td>
                        <td style="border: 2px solid black; padding: 10px;"><?= number_format($slip_gaji->total_jam_lembur) ?> Jam </td>
                        <td style="border: 2px solid black; padding: 10px;">Bayaran per-Jam</td>
                        <td style="border: 2px solid black; padding: 10px;">Rp. <?= number_format($slip_gaji->bayaran_lembur_perjam) ?></td>
                        <td style="border: 2px solid black; padding: 10px;">Rp. <?= number_format($slip_gaji->total_bayaran_lembur_perjam) ?></td>
                    </tr>
                    <tr>
                        <td colspan="5" style="border: 2px solid black; padding: 10px;"></td>
                        <td style="border: 2px solid black; padding: 10px;"><b>Rp. <?= number_format ($slip_gaji->total_bayaran_harian + $slip_gaji->total_bayaran_transportasi_harian + $slip_gaji->total_bayaran_konsumsi_harian + $slip_gaji->total_bayaran_lembur_perjam) ?></b></td>
                    </tr>
                    <tr>
                        <td style="border: 2px solid black; padding: 10px;">3</td>
                        <td style="border: 2px solid black; padding: 10px;">Absensi Telat</td>
                        <td style="border: 2px solid black; padding: 10px;"><?= number_format($slip_gaji->total_hari_telat) ?> hari </td>
                        <td style="border: 2px solid black; padding: 10px;">Potongan per-Hari</td>
                        <td style="border: 2px solid black; padding: 10px;">Rp. <?= number_format($slip_gaji->bayaran_penalti) ?></td>
                        <td style="border: 2px solid black; padding: 10px;"> Rp. <?= number_format($slip_gaji->total_hari_telat * $slip_gaji->bayaran_penalti) ?></td>
                    </tr>
                    <tr>
                        <td style="border: 2px solid black; padding: 10px;">4</td>
                        <td style="border: 2px solid black; padding: 10px;">Checkout Awal</td>
                        <td style="border: 2px solid black; padding: 10px;"><?= number_format($slip_gaji->total_hari_checkout_awal) ?> hari </td>
                        <td style="border: 2px solid black; padding: 10px;">Potongan per-Hari</td>
                        <td style="border: 2px solid black; padding: 10px;">Rp. <?= number_format($slip_gaji->bayaran_penalti) ?></td>
                        <td style="border: 2px solid black; padding: 10px;">Rp. <?= ($slip_gaji->total_hari_checkout_awal * $slip_gaji->bayaran_penalti) ?></td>
                    </tr>
                    <tr>
                        <td colspan="5" style="border: 2px solid black; padding: 10px;"></td>
                        <td style="border: 2px solid black; padding: 10px;"><b>Rp. <?= number_format($slip_gaji->total_bayaran_penalti) ?></b></td>
                    </tr>
                    <tr>
                        <td colspan="5" style="border: 2px solid black; padding: 10px;">Total</td>
                        <td style="border: 2px solid black; padding: 10px;"><b>Rp. <?= number_format($slip_gaji->total_bayaran) ?></b></td>
                    </tr>
                </tbody>
                <tfoot>
                    
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