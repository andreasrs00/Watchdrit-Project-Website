<?php
include '../koneksi.php';

// Menerima data dari frontend
$postData = json_decode(file_get_contents("php://input"), true);

if (isset($postData['purchaseData']) && is_array($postData['purchaseData'])) {
    // Loop melalui data pembelian dan masukkan ke dalam tabel pembelian
    foreach ($postData['purchaseData'] as $purchaseItem) {
        $idProduk = $purchaseItem['id'];
        $hargaProduk = $purchaseItem['price'];

        // Sesuaikan query ini dengan struktur tabel Anda
        $query = "INSERT INTO pembelian (id_produk, total_harga) VALUES ($idProduk, $hargaProduk)";
        $execQuery = pg_query($connection, $query);

        // Tambahkan logika lain yang diperlukan di sini
    }

    // Respon ke client (jika diperlukan)
    echo json_encode(['status' => 'success', 'message' => 'Purchase successful']);
} else {
    // Handle jika data tidak sesuai harapan
    echo json_encode(['status' => 'error', 'message' => 'Invalid data format']);
}
?>
