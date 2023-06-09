<script>
    $(document).ready(function() {
        // Get current page URL
        var url = window.location.href;

        // Remove trailing slashes from the URL
        url = url.replace(/\/$/, "");

        // Remove any query strings from the URL
        url = url.split("?")[0];

        // Get the nav link elements
        var navLinks = $("ul.nav-sidebar a");

        // Loop through each nav link element
        navLinks.each(function() {
            var href = $(this).attr("href");

            if (url == href) {
                $(this).addClass("active");
            } else if (url.indexOf("<?= base_url('C_Dashboard') ?>") === 0) {
                var dashboardLink = $("a[href='" + "<?= base_url('C_Dashboard') ?>" +
                    "']");

                dashboardLink.addClass("active");
            } else if (url.indexOf("<?= base_url('C_User') ?>") === 0 || url.indexOf(
                    "<?= base_url('C_User/edit_user') ?>") === 0) {
                var userLink = $("a[href='" + "<?= base_url('C_User/data_user') ?>" +
                    "']");

                userLink.addClass("active");
                userLink.closest(".nav-treeview").prev(".nav-link").addClass("active");
                userLink.closest(".nav-treeview").parent().addClass("menu-open");
            } else if (url.indexOf("<?= base_url('C_Auth') ?>") === 0) {
                // Get the Fitur Aplikasi nav link element
                var changePasswordLink = $("a[href='" + "<?= base_url('C_Auth/ganti_password') ?>" +
                    "']");

                changePasswordLink.addClass("active");
                changePasswordLink.closest(".nav-treeview").prev(".nav-link").addClass("active");
                changePasswordLink.closest(".nav-treeview").parent().addClass("menu-open");
            } else if (url.indexOf("<?= base_url('C_Bpjs') ?>") === 0) {
                // Get the Fitur Aplikasi nav link element
                var bpjsLink = $("a[href='" + "<?= base_url('C_Bpjs/data_bpjs') ?>" +
                    "']");

                bpjsLink.addClass("active");
                bpjsLink.closest(".nav-treeview").prev(".nav-link").addClass("active");
                bpjsLink.closest(".nav-treeview").parent().addClass("menu-open");
            } else if (url.indexOf("<?= base_url('C_Karyawan') ?>") === 0) {
                // Get the Fitur Aplikasi nav link element
                var karyawanLink = $("a[href='" + "<?= base_url('C_Karyawan/data_karyawan') ?>" +
                    "']");

                karyawanLink.addClass("active");
                karyawanLink.closest(".nav-treeview").prev(".nav-link").addClass("active");
                karyawanLink.closest(".nav-treeview").parent().addClass("menu-open");
            } else if (url.indexOf("<?= base_url('C_Jabatan') ?>") === 0) {
                // Get the Fitur Aplikasi nav link element
                var jabatanLink = $("a[href='" + "<?= base_url('C_Jabatan/data_jabatan') ?>" +
                    "']");

                jabatanLink.addClass("active");
                jabatanLink.closest(".nav-treeview").prev(".nav-link").addClass("active");
                jabatanLink.closest(".nav-treeview").parent().addClass("menu-open");
            } else if (url.indexOf("<?= base_url('C_Rekap_Absen') ?>") === 0) {
                // Get the Fitur Aplikasi nav link element
                var rekapAbsenLink = $("a[href='" + "<?= base_url('C_Rekap_Absen/data_rekap_absen') ?>" +
                    "']");

                rekapAbsenLink.addClass("active");
                rekapAbsenLink.closest(".nav-treeview").prev(".nav-link").addClass("active");
                rekapAbsenLink.closest(".nav-treeview").parent().addClass("menu-open");
            } else if (url.indexOf("<?= base_url('C_Data_Gaji') ?>") === 0) {
                // Get the Fitur Aplikasi nav link element
                var dataGajiLink = $("a[href='" + "<?= base_url('C_Data_Gaji/data_gaji') ?>" +
                    "']");

                dataGajiLink.addClass("active");
                dataGajiLink.closest(".nav-treeview").prev(".nav-link").addClass("active");
                dataGajiLink.closest(".nav-treeview").parent().addClass("menu-open");
            } else if (url.indexOf("<?= base_url('C_Laporan_Gaji') ?>") === 0) {
                // Get the Fitur Aplikasi nav link element
                var laporanGajiLink = $("a[href='" + "<?= base_url('C_Laporan_Gaji/data_laporan_gaji') ?>" +
                    "']");

                laporanGajiLink.addClass("active");
                laporanGajiLink.closest(".nav-treeview").prev(".nav-link").addClass("active");
                laporanGajiLink.closest(".nav-treeview").parent().addClass("menu-open");
            } else if (url.indexOf("<?= base_url('C_Slip_Gaji') ?>") === 0) {
                // Get the Fitur Aplikasi nav link element
                var slipGajiLink = $("a[href='" + "<?= base_url('C_Slip_Gaji/data_slip_gaji') ?>" +
                    "']");

                slipGajiLink.addClass("active");
                slipGajiLink.closest(".nav-treeview").prev(".nav-link").addClass("active");
                slipGajiLink.closest(".nav-treeview").parent().addClass("menu-open");
            }
        });
    });
</script>