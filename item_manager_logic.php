<?php
include "koneksi.php";
if (isset($_POST['auctioned_button'])) {
    $statusFilter = 'Auctioned';
    displayItems($statusFilter);
} elseif (isset($_POST['pending_button'])) {
    $statusFilter = 'Pending';
    displayItems($statusFilter);
} elseif (isset($_POST['approved_button'])) {
    $statusFilter = 'Approved';
    displayItems($statusFilter);
} elseif (isset($_POST['cancelled_button'])) {
    $statusFilter = 'Cancelled';
    displayItems($statusFilter);
} elseif (isset($_POST['sold_button'])) {
    $statusFilter = 'Sold';
    displayItems($statusFilter);
}

function displayItems($statusFilter)
{ ?>
    <div class="row gap-2">
        <?php
        include "koneksi.php";
        $statusFilter = mysqli_real_escape_string($conn, $statusFilter);
        $qry_item = mysqli_query($conn, "SELECT * FROM item WHERE status LIKE '$statusFilter'");
        while ($dt_item = mysqli_fetch_array($qry_item)) {
        ?>
            <div class="card my-4 shadow" style="max-width: 500px;">
                <div class="row g-0">
                    <div class="col-md-4 my-auto">
                        <img src="display_image.php?image_id=<?php echo $dt_item['id']; ?>" class="rounded w-100" />
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h2 class="card-title">
                                <?= $dt_item['name'] ?>
                                </h3>
                                <h5 class="card-title">
                                    <?= $dt_item['startprice'] ?>
                                </h5>
                                <p class="card-text">
                                    <?= substr($dt_item['deskripsi'], 0, 20) ?>
                                </p>
                                <?php
                                if ($statusFilter == 'Pending') {
                                    echo '<a href="item_update_status.php?id=' . $dt_item['id'] . '&action=Approved" onclick="return confirm(\'Apakah anda yakin untuk Aprrove item ini?\')" class="btn btn-primary">Approve</a>';
                                    echo '<a href="item_update_status.php?id=' . $dt_item['id'] . '&action=Reject" onclick="return confirm(\'Apakah anda yakin untuk reject item ini?\')" class="btn btn-warning ms-2">Reject</a>';
                                }
                                if ($statusFilter == 'Approved') {
                                    echo '<a href="item_update_status.php?id=' . $dt_item['id'] . '&action=auction" onclick="return confirm(\'Apakah anda yakin untuk start auction\')" class="btn btn-primary">Start Auction</a>';
                                    echo '<a href="item_update_status.php?id=' . $dt_item['id'] . '&action=Cancel" onclick="return confirm(\'Apakah anda yakin untuk cancel auction ini?\')" class="btn btn-danger ms-2">Cancel</a>';
                                }
                                if ($statusFilter == 'Auctioned') {
                                    echo '<a href="item_update_status.php?id=' . $dt_item['id'] . '&action=Sold" onclick="return confirm(\'Apakah anda yakin untuk menghentikan auction ini?\')" class="btn btn-warning">End Auction</a>';
                                }
                                if ($statusFilter == 'Sold') {
                                    echo '<a href="item_update_status.php?id=' . $dt_item['id'] . '&action=Reject" onclick="return confirm(\'Apakah anda yakin untuk menghapus auction ini?\')" class="btn btn-danger">Delete</a>';
                                    echo '<a href="history.php?id_item=' . $dt_item['id'] . '" class="btn btn-primary ms-2">Winner</a>';
                                }
                                if ($statusFilter == 'Cancelled') {
                                    echo '<a href="item_update_status.php?id=' . $dt_item['id'] . '&action=Reject" onclick="return confirm(\'Apakah anda yakin untuk menghapus auction ini?\')" class="btn btn-danger">Delete</a>';
                                }
                                ?>
                        </div>
                    </div>
                </div>
            </div>
    <?php
        }
    }
    ?>
    </div>