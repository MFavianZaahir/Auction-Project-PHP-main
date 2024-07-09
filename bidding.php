<?php
include "header.php";
include "koneksi.php";
if (isset($_GET['id'])) {
    $_SESSION['item_id'] = $_GET['id'];
} else if (!isset($_GET['id'])) {
    'location: auction.php';
}
$item_id = $_SESSION['item_id'];
$qry_detail_item = mysqli_query($conn, "select * from item where id = '$item_id'");
$dt_item = mysqli_fetch_array($qry_detail_item);
?>

<div class="container d-flex gap-2" style="margin-top: 6rem;">
    <div class="card" style="width: 30rem;">
        <img src="display_image.php?image_id=<?php echo $dt_item['id']; ?>" class="rounded w-100" />
        <div class="card-body">
            <h5 class="card-title"><?= $dt_item['name'] ?></h5>
            <p class="card-text"><?= $dt_item['deskripsi'] ?>.</p>
            <form action="bidding_process.php" method="post">
                <input type="number" name="bid" class="form-control" min="1">
                <input type="submit" name="simpan" value="Place Bid" class="btn btn-primary w-100 mt-3"/>
            </form>
        </div>
    </div>

    <div class="container-fluid">
        <table class="table table-hover table-striped shadow">
            <thead class="table-info">
                <th>NO</th>
                <th>username</th>
                <th>Bid</th>
            </thead>
            <?php
            include "koneksi.php";
            $qry_bids = mysqli_query($conn, "select * from bids WHERE id_item = '$item_id' order by bid desc");
            $no = 0;
            while ($dt_bids = mysqli_fetch_array($qry_bids)) {
                $no++;
                $id_user = $dt_bids['id_user'];
                $qry_user = mysqli_query($conn, "SELECT username FROM client WHERE id = '$id_user'");
                $nama_user = mysqli_fetch_array($qry_user);
                ?>
                <tr>
                    <td>
                        <?= $no ?>
                    </td>
                    <td>
                        <?= $nama_user['username'] ?>
                    </td>
                    <td>
                        <?= $dt_bids['bid'] ?>
                    </td>
                </tr>

                <?php
            }
            ?>
        </table>
    </div>
</div>
</body>

</html>