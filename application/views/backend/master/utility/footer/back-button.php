<script>
    // Menangani event click pada tombol kembali
    document.getElementById("back-button").addEventListener("click", function(event) {
        // Mencegah submit form
        event.preventDefault();
        // Mengambil URL yang tersimpan pada atribut data-url
        var url = this.getAttribute("data-url");
        // Melakukan navigasi ke halaman yang ditentukan
        window.location.href = url;
    });
</script>