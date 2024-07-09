<?php
include "header.php";
include "koneksi.php";
if (!isset($_SESSION['id'])) {
    echo "<script>alert('belum login');location.href='home.php';</script>";
}
?>

<div class="container" style="padding-top: 4rem;">
    <div class="text-center p-3">
        <h3>Your Bids</h3>
    </div>
    <table class="table table-hover table-striped shadow">
        <thead>
            <tr class="text-center">
                <th>ID Item</th>
                <th>Item</th>
                <th>Your Bid</th>
                <th>Status</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $qry_bids = mysqli_query($conn, "select * from bids where id_user =" . $_SESSION['id']);
            $no = 0;
            while ($dt_bid = mysqli_fetch_array($qry_bids)) {
                $qry_itemname = mysqli_query($conn, "select * from item where id =" . $dt_bid['id_item']);
                $itemname = mysqli_fetch_array($qry_itemname);
                $win_check = mysqli_query($conn, "select * from history where id_item =" . $dt_bid['id_item']);
                $winning = mysqli_fetch_array($win_check);
                $no++;
            ?>
                <tr class="text-center">
                    <td>
                        <?= $dt_bid['id_item'] ?>
                    </td>
                    <td>
                        <?= $itemname['name'] ?>
                    </td>
                    <td>
                        <?= $dt_bid['bid'] ?>
                    </td>
                    <td>
                        <?php
                        if (isset($winning['id_winner'])) {
                            if ($winning['id_winner'] == $_SESSION['id']) {
                                echo 'Win';
                            } else {
                                echo 'Lose';
                            }
                        } else {
                            echo 'Ongoing';
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        if ($itemname['status'] == 'Sold') {
                            echo '<a href="history.php?id_item=' . $dt_bid['id_item'] . '" class="btn btn-primary ms-2">Details</a>';
                        } else {
                            echo '<a href="bidding.php?id=' . $dt_bid['id_item'] . '" class="btn btn-warning ms-2">Ongoing</a>';
                        }
                        ?>

                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>
</body>

</html>