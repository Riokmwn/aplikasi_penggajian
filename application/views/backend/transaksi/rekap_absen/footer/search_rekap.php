<script>
    document.getElementById('search_absen').addEventListener('click', function() {
        var selectedMonth = document.getElementById('bulan').value;
        var selectedYear = document.getElementById('tahun').value;

        // Construct the URL based on the selected month and year
        var searchUrl = '<?= base_url('C_Rekap_Absen/data_rekap_absen') ?>' + '?bulan=' + selectedMonth +
            '&tahun=' + selectedYear;

        // Redirect the page to the search URL
        window.location.href = searchUrl;
    });
</script>