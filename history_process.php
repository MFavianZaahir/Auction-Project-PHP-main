<?php
include "koneksi.php";
if ($_GET) {
    $id = $_GET['id'];
    $history_query = mysqli_query($conn, "SELECT * FROM bids WHERE bid = (SELECT MAX(bid) FROM bids WHERE id_item = " . $id . ") AND id_item = " . $id);

    if (mysqli_num_rows($history_query) == 0) {
        echo "<script>
        var confirmCancel = confirm('No bids detected. Do you want to cancel the auction instead?'); 
        if (confirmCancel) {
            location.href = 'item_update_status.php?id=" . $_GET['id'] . "&action=Cancel';
        } else {
            location.href = 'item_manager.php';
        }
        </script>";
    } else {
        $dt_history = mysqli_fetch_array($history_query);
        $id_winner = $dt_history["id_user"];
        $id_item = $dt_history["id_item"];
        $final_bid = $dt_history["bid"];
        $winner_query = mysqli_query($conn, "SELECT * FROM client WHERE id =" . $id_winner);
        $dt_history_winner = mysqli_fetch_array($winner_query);
        $winner = $dt_history_winner["username"];
        $insert = mysqli_query($conn, "INSERT INTO history (id_item, id_winner, winner, final_bid)
        VALUES ('" . $id_item . "','" . $id_winner . "', '" . $winner . "', '" . $final_bid . "')") or die(mysqli_error($conn));
        $qry_status = mysqli_query($conn, "UPDATE item SET status = 'sold' WHERE id='" . $_GET['id'] . "'");

        if ($insert) {
            echo "<script>alert('Sukses end auction');location.href='item_manager.php';</script>";
        } else {
            echo "<script>alert('Failed to add history');location.href='item_manager.php';</script>";
        }
    }
}
