<script>
function formatNumber(input) {
    // Menghapus semua karakter selain digit dari input
    var value = input.value.replace(/\D/g, '');

    // Memformat angka dengan titik setiap 3 digit
    value = value.replace(/\B(?=(\d{3})+(?!\d))/g, ',');

    // Menyimpan hasil format ke dalam input
    input.value = value;
}
</script>