<?php
include "header.php";
include "koneksi.php";
if (!isset($_SESSION['id'])) {
  echo "<script>alert('belum login kontol');location.href='home.php';</script>";
}
?>
<div class="container" style="padding-top: 4rem;">
  <div class="row gap-3">
    <?php
    $qry_item = mysqli_query($conn, "select * from item where id_publisher = '" . $_SESSION['id'] . "'");
    while ($dt_item = mysqli_fetch_array($qry_item)) {
      ?>
      <div class="col-md-3">
        <div class="card shadow">
        <img src="display_image.php?image_id=<?php echo $dt_item['id']; ?>" class="rounded w-100" />
          <div class="card-body">
            <h2 class="card-title">
              <?= $dt_item['name'] ?>
            </h2>
            <h5 class="card-title">
              <?= $dt_item['startprice'] ?>
            </h5>
            <p class="card-text">
              <?= $dt_item['deskripsi'] ?>
            </p>
            <a href="details_publisher_item.php?id_item=<?= $dt_item['id'] ?>" class="btn btn-primary w-100">See Details</a>
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