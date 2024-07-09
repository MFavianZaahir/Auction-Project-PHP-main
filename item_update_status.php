<?php
include "koneksi.php";

if (isset($_GET['id']) && isset($_GET['action'])) {
    $item_id = $_GET['id'];
    $action = $_GET['action'];

    switch ($action) {
        case 'Reject':
            $result = mysqli_query($conn, "select cover from item where id='" . $_GET['id'] . "'");
            $qry_hapus = mysqli_query($conn, "delete from item where id='" . $_GET['id'] . "'");
            $qry_hapusbid = mysqli_query($conn, "delete from bids where id_item='" . $_GET['id'] . "'");
            if ($qry_hapus) {
                echo "<script>alert('Sukses hapus auction');location.href='item_manager.php';</script>";
            } else {
                echo "<script>alert('Gagal hapus auction');location.href='item_manager.php';</script>";
            }
            break;

        case 'Approved':
            $qry_status = mysqli_query($conn, "UPDATE item SET status = 'approved' where id='" . $_GET['id'] . "'");
            if ($qry_status) {
                echo "<script>alert('Sukses aprrove auction');location.href='item_manager.php';</script>";
            } else {
                echo "<script>alert('Gagal aprrove auction');location.href='item_manager.php';</script>";
            }
            break;

        case 'Cancel':
            $qry_status = mysqli_query($conn, "UPDATE item SET status = 'Cancelled' where id='" . $_GET['id'] . "'");
            if ($qry_status) {
                echo "<script>alert('Sukses aprrove auction');location.href='item_manager.php';</script>";
            } else {
                echo "<script>alert('Gagal aprrove auction');location.href='item_manager.php';</script>";
            }
            break;

        case 'auction':
            $qry_status = mysqli_query($conn, "UPDATE item SET status = 'Auctioned' where id='" . $_GET['id'] . "'");
            if ($qry_status) {
                echo "<script>alert('Sukses start auction');location.href='item_manager.php';</script>";
            } else {
                echo "<script>alert('Gagal start auction');location.href='item_manager.php';</script>";
            }
            break;

        case 'Sold':
            echo "<script>location.href='history_process.php?id=" . $_GET['id'] . "';</script>";
            break;

        default:
            echo 'Invalid status';
    }
} else {
    echo 'Missing required parameters';
}
if ($_GET['id']) {
    include "koneksi.php";
}
