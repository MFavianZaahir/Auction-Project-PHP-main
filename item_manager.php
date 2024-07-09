<?php
include "header.php";
include "koneksi.php";
if (!isset($_SESSION['id'])) {
    echo "<script>alert('belum login kontol');location.href='home.php';</script>";
}
else if($_SESSION['role'] !== 'admin'){
    echo "<script>alert('admin mana kontol');location.href='home.php';</script>";
}
?>
<div class="container" style="padding-top: 5rem;">
    <div class="section">
        <form method="post" class="row justify-content-evenly">
            <button type="submit" name="pending_button" class="col-2  btn btn-primary shadow">Show Pending Items</button>
            <button type="submit" name="approved_button" class="col-2  btn btn-success shadow">Show Approved Items</button>
            <button type="submit" name="auctioned_button" class="col-2 btn btn-warning text-white shadow">Show Auctioned Items</button>
            <button type="submit" name="sold_button" class="col-2  btn btn-danger shadow">Show sold Items</button>
            <button type="submit" name="cancelled_button" class="col-2  btn btn-secondary shadow">Show cancelled Items</button>
            <?php include "item_manager_logic.php"; ?>
        </form>
    </div>
</div>
</body>

</html>