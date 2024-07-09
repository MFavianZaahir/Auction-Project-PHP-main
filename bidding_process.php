<?php
session_start();
if (isset($_SESSION['id'])) {
    $id_user = $_SESSION['id'];
    if ($_POST) {
        $bid = $_POST['bid'];
        $id_item = $_SESSION['item_id'];
        include "koneksi.php";
        $insert = mysqli_query($conn, "insert into bids (id_user, id_item, bid) value ('" . $id_user . "','" . $id_item . "','" . $bid . "')") or die(mysqli_error($conn));
        if ($insert) {
            echo "<script>alert('Sukses menambahkan item');location.href='bidding.php';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan item');location.href='bidding.php';</script>";
        }
    }
} else {
    echo "<script>alert('You are not logged in');location.href='bidding.php';</script>";
}
?>