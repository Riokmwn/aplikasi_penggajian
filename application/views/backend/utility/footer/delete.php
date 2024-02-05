<!-- Script for Delete Data SweetAlert -->
<script>
    $(function() {
        $('.delete').click(function(e) {
            e.preventDefault();
            var url = $(this).data('url');
            Swal.fire({
                title: "Apakah Anda yakin?",
                text: "Data akan dihapus secara permanen!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#dc3545",
                confirmButtonText: "Ya, hapus data!",
                cancelButtonText: "Tidak, batalkan!",
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url;
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
            title: "Gagal Menghapus Data",
            text: "Terjadi kesalahan saat menghapus data: " + errorMessage,
            icon: "error",
            confirmButtonColor: "#dc3545",
            confirmButtonText: "Tutup"
        });
    }

    function cancelDeletion() {
        Swal.fire({
            title: "Penghapusan Data Dibatalkan",
            icon: "warning",
            confirmButtonColor: "#3085d6",
            confirmButtonText: "Tutup"
        });
    }
</script>