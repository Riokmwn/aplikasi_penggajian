<script>
    $(function() {
        $('.reset-password').click(function(e) {
            e.preventDefault();
            var url = $(this).data('url');
            Swal.fire({
                title: "Reset Password",
                text: "Apakah Anda yakin ingin mereset password user ini?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#dc3545",
                confirmButtonText: "Ya, reset password!",
                cancelButtonText: "Tidak, batalkan!",
            }).then((result) => {
                if (result.isConfirmed) {
                    deleteUrl(url);
                } else {
                    cancelDeletion();
                }
            });
        });
    });

    function deleteUrl(url) {
        $.ajax({
            url: url,
            type: 'POST',
            success: function(response) {
                redirectToUrl(url);
            },
            error: function(xhr, status, error) {
                showDeleteErrorAlert(xhr.responseText);
            }
        });
    }

    function redirectToUrl(url) {
        window.location.href = url;
        location.reload();
    }

    function showDeleteErrorAlert(errorMessage) {
        Swal.fire({
            title: "Gagal Mereset Password",
            text: "Terjadi kesalahan saat mereset password: " + errorMessage,
            icon: "error",
            confirmButtonColor: "#dc3545",
            confirmButtonText: "Tutup"
        });
    }

    function cancelDeletion() {
        Swal.fire({
            title: "Reset Password Dibatalkan",
            icon: "warning",
            confirmButtonColor: "#3085d6",
            confirmButtonText: "Tutup"
        });
    }
</script>