<?php
session_start(); // Start the session

include '../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    function sanitize($input) {
        // Implement your sanitization logic here
        return $input;
    }

    if (isset($_POST['tambahPembelian'])) {
        $idProduk = sanitize($_POST['idProduk']);
        $namaProduk = sanitize($_POST['namaProduk']);
        $hargaProduk = sanitize($_POST['hargaProduk']);
        $idCustomer = $_SESSION['id_customer'] ?? ''; // Default to an empty string if not set
        unset($_SESSION['id_cartcollection']);

        if (!isset($_SESSION['id_cart'])) {
            if (empty($idCustomer)) {
                echo 'Failed to make Cart. Invalid id_customer.';
            } else {
                if (!isset($_SESSION['totalHarga'])) {
                    $_SESSION['totalHarga'] = 0;
                }
    
                $_SESSION['totalHarga'] += $hargaProduk;
    
                // Initialize $id_cart with an empty string
                $date = date("Y/m/d");
    
                $query = "INSERT INTO cart (id_customer) VALUES ($idCustomer) RETURNING id_cart";
                $execQuery = pg_query($connection, $query);
    
                if ($execQuery) {
                    $result = pg_fetch_assoc($execQuery);
                    $_SESSION['id_cart'] = $result['id_cart'];
                    $id_cart = $_SESSION['id_cart'];
    
                    echo 'Cart Made Successfully';
    
                    $queryBarang = "INSERT INTO pembelian (id_produk, id_cart) VALUES ('$idProduk', '$id_cart')";
                    $execQueryBarang = pg_query($connection, $queryBarang);
    
                    if ($execQueryBarang) {
                        echo 'Item added Successfully';
                        header('Location: index.php');
                        exit;
                    } else {
                        echo 'Item cannot be added';
                    }
                } else {
                    echo 'Failed to make Cart';
                }
            }
        } else {
            $id_cart = $_SESSION['id_cart'];
            $queryBarang = "INSERT INTO pembelian (id_produk, id_cart) VALUES ('$idProduk', '$id_cart')";
            $execQueryBarang = pg_query($connection, $queryBarang);

            if ($execQueryBarang) {
                        echo 'Item added Successfully';
                        header('Location: index.php');
                        exit;
                    } else {
                        echo 'Item cannot be added';
                    }
        }
    }

    if (isset($_POST['submitPembelian'])){
        $idCart = $_SESSION['id_cart'];
        $totalHarga = $_POST['totalHarga'];

        $query = "UPDATE cart SET total_pembelian = '$totalHarga' WHERE id_cart = '$idCart'";
        $execQuery = pg_query($connection, $query);

        if ($execQuery) {
            echo 'Berhasil';
            unset($_SESSION['id_cart']);
        } else {
            echo 'fail';
        }
    }
    if (isset($_POST['clearPembelian'])) {
        $idCart = $_SESSION['id_cart'];

        $query = "DELETE FROM pembelian WHERE id_cart = '$idCart'";
        $execQuery = pg_query($connection, $query);

        $query2 = "DELETE FROM cart WHERE id_cart = '$idCart'";
        $execQuery2 = pg_query($connection, $query2);

        if ($execQuery && $execQuery2) {
            echo "Berhasil";
            header('Location: index.php');
            unset($_SESSION['id_cart']);
        } else {
            echo "Gagal";
        }
    }
}
?>
