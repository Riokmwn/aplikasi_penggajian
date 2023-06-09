<script>
document.getElementById('print_gaji').addEventListener('click', function() {
    var selectedMonth = document.getElementById('bulan').value;
    var selectedYear = document.getElementById('tahun').value;

    // Check if month and year are selected
    if (selectedMonth === '' && selectedYear === '') {
        // Show error message for both month and year using SweetAlert2
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Mohon isi bulan dan tahun!'
        });
    } else if (selectedMonth === '') {
        // Show error message for month using SweetAlert2
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Mohon isi bulan!'
        });
    } else if (selectedYear === '') {
        // Show error message for year using SweetAlert2
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Mohon isi tahun!'
        });
    } else {
        // Perform AJAX request to check if selected month and year exist in the rekap_gaji table
        var url = '<?= base_url('C_Data_Gaji/check_data_existence') ?>';

        // Send AJAX request to the server
        $.ajax({
            url: url,
            type: 'POST',
            data: {
                bulan: selectedMonth,
                tahun: selectedYear
            },
            success: function(response) {
                if (response === 'true') {
                    // Construct the URL based on the selected month and year
                    var searchUrl = '<?= base_url('C_Data_Gaji/data_gaji_print') ?>' + '?bulan=' +
                        selectedMonth +
                        '&tahun=' + selectedYear;

                    // Redirect the page to the search URL
                    window.location.href = searchUrl;
                } else {
                    // Show error message using SweetAlert2
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Data tidak tersedia untuk bulan dan tahun yang dipilih!'
                    });
                }
            },
            error: function() {
                // Show error message for AJAX request using SweetAlert2
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Terjadi kesalahan saat memeriksa data!'
                });
            }
        });
    }
});
</script>

<script>
document.getElementById("print_page_now").onclick = function() {
    window.print();
};
</script>