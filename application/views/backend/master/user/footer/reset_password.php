<!-- <script>
    $(document).on('click', '.reset-password', function() {
        var url = $(this).data('url');
        if (confirm("Apakah Anda yakin ingin mereset password user ini?")) {
            $.ajax({
                url: url,
                type: 'POST',
                success: function(result) {
                    alert("Password telah berhasil direset.");
                    location.reload();
                },
                error: function() {
                    alert("Terjadi kesalahan saat mereset password.");
                }
            });
        }
    });
</script> -->

<script>
    $(document).on('click', '.reset-password', function() {
        var url = $(this).data('url');
        Swal.fire({
            title: 'Apakah Anda yakin ingin mereset password user ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: url,
                    type: 'POST',
                    success: function(result) {
                        Swal.fire({
                            title: 'Password berhasil direset',
                            icon: 'success'
                        }).then(() => {
                            location.reload();
                        });
                    },
                    error: function() {
                        Swal.fire({
                            title: 'Terjadi kesalahan saat mereset password',
                            icon: 'error'
                        });
                    }
                });
            }
        });
    });
</script>