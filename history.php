<?php
include "header.php";
include "koneksi.php";
if ($_GET['id_item']) {
    $item_id = $_GET['id_item'];
    $qry_item = mysqli_query($conn, "SELECT * FROM item WHERE id =" . $item_id);
    $qry_history = mysqli_query($conn, "SELECT * FROM history WHERE id_item =" . $item_id);

    $dt_item = mysqli_fetch_array($qry_item);
    $dt_history = mysqli_fetch_array($qry_history);
?>
    <div class="container" style="text-align: center; margin-top:100px;">
        <div class="smh col-md-3" style="text-align: center; display:inline-block">
            <div class="card">
                <img src="display_image.php?image_id=<?php echo $dt_item['id']; ?>" class="rounded w-100" />
                <div class="card-body">
                    <h2 class="card-title">
                        <?= $dt_item['name'] ?>
                    </h2>
                    <h5 class="card-title">
                        Winner: <?= $dt_history['winner'] ?>
                    </h5>
                    </h5>
                    <p class="card-text">
                        Final Bid: <?= $dt_history['final_bid'] ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
<?php
} else {
    echo "<script>alert('Error Cik!!!');</script>";
}
?>