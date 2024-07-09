<?php include "header.php" ?>

<div class="container" style="margin-top: 5rem" id="auction-container">
    <h1 class="text-center">
        Ongoing Auction
    </h1>
    <div class="row min-h-75">
        <?php
        include "koneksi.php";
        $qry_item = mysqli_query($conn, "SELECT * FROM item WHERE STATUS = 'Auctioned'");
        while ($dt_item = mysqli_fetch_array($qry_item)) {
            ?>
            <div class="smh col-md-3">
                <div class="card">
                <img src="display_image.php?image_id=<?php echo $dt_item['id']; ?>" class="rounded w-100" />
                    <div class="card-body">
                        <h2 class="card-title">
                            <?= $dt_item['name'] ?>
                        </h2>
                        <h5 class="card-title">
                            <?= $dt_item['startprice'] ?>
                        </h5>
                        <p class="card-text">
                            <?= substr($dt_item['deskripsi'], 0, 20) ?>
                        </p>
                        <a href="bidding.php?id=<?= $dt_item['id'] ?>" class="btn btn-primary w-100">Bid here</a>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>

    <h1 class="mt-5 text-center">Coming Soon</h1>
    <div class="row min-h-75">
        <?php
        include "koneksi.php";
        $qry_item = mysqli_query($conn, "SELECT * FROM item WHERE STATUS = 'Approved'");
        while ($dt_item = mysqli_fetch_array($qry_item)) {
            ?>
            <div class="smh col-md-3">
                <div class="card">
                <img src="display_image.php?image_id=<?php echo $dt_item['id']; ?>" class="rounded w-100" />
                    <div class="card-body">
                        <h5 class="card-title">
                            <?= $dt_item['name'] ?>
                        </h5>
                        <h4 class="card-title">
                            <?= $dt_item['startprice'] ?>
                        </h4>
                        <p class="card-text">
                            <?= substr($dt_item['deskripsi'], 0, 20) ?>
                        </p>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>

</div>
</body>

</html>