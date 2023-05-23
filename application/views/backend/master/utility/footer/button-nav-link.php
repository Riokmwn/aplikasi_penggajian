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
            var userLink = $("a[href='" + "<?= base_url('C_Dashboard') ?>" +
                "']");

            userLink.addClass("active");
        } else if (url.indexOf("<?= base_url('C_User') ?>") === 0 || url.indexOf(
                "<?= base_url('C_User/edit_user') ?>") === 0) {
            var userLink = $("a[href='" + "<?= base_url('C_User/data_user') ?>" +
                "']");

            userLink.addClass("active");
        } else if (url.indexOf("<?= base_url('C_Auth/change_password') ?>") === 0) {
            // Get the Fitur Aplikasi nav link element
            var changePasswordLink = $("a[href='" + "<?= base_url('C_Auth') ?>" +
                "']");

            changePasswordLink.addClass("active");
        } else if (url.indexOf("<?= base_url('C_Karyawan') ?>") === 0) {
            // Get the Fitur Aplikasi nav link element
            var karyawanLink = $("a[href='" + "<?= base_url('C_Karyawan/data_karyawan') ?>" +
                "']");

            karyawanLink.addClass("active");
        } else if (url.indexOf("<?= base_url('C_Jabatan/edit_jabatan') ?>") === 0) {
            // Get the Fitur Aplikasi nav link element
            var jabatanLink = $("a[href='" + "<?= base_url('C_Jabatan/data_jabatan') ?>" +
                "']");

            jabatanLink.addClass("active");
        } else if (url.indexOf("<?= base_url('C_Laporan') ?>") === 0) {
            // Get the Fitur Aplikasi nav link element
            var laporanLink = $("a[href='" + "<?= base_url('C_Laporan') ?>" +
                "']");

            laporanLink.addClass("active");
        } else if (url.indexOf("<?= base_url('C_Transaksi') ?>") === 0) {
            // Get the Fitur Aplikasi nav link element
            var transaksiLink = $("a[href='" + "<?= base_url('C_Transaksi') ?>" +
                "']");

            transaksiLink.addClass("active");
        }
    });
});
</script>