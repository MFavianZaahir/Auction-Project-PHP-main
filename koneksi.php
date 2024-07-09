<?php
$conn = mysqli_connect('localhost', 'root', '', 'auction');
// $conn=mysqli_connect('sql.freedb.tech','freedb_muham','9ucNQDsa*jX$8S8','freedb_auction_db');
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
?>