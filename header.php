<?php
session_start()
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
  </style>
  <link href="Bgs/logo.svg" rel="icon">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <title>Auction</title>
</head>


<style>
  .min-h-75 {
    min-height: 75vh;
  }

  ::-webkit-scrollbar {
    width: 0px;
  }
</style>

<body>
  <nav class="navbar fixed-top navbar-expand-lg navbar-white bg-white" id="nav">
    <div class="container">
      <a class="navbar-brand fw-bold fs-3" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">Auction</a>
      <button class=" navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link fw-medium fs-5" aria-current="page" href="home.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-medium fs-5" href="auction.php">Auction</a>
          </li>
          <?php
          if (isset($_SESSION['status_login']) && $_SESSION['status_login'] == true) {
            // Tampilkan Logout jika pengguna sudah login
            echo '<li class="nav-item">
            <a class="nav-link fw-medium fs-5" href="logout.php">Logout</a>
          </li>';
          } else {
            // Tampilkan Login jika pengguna belum login
            echo '<li class="nav-item">
            <a class="nav-link fw-medium fs-5" href="login.php">Login</a>
          </li>';
          }
          ?>
        </ul>

        <span class="navbar-text ms-3 mt-2">
          <?php
          if (isset($_SESSION['status_login'])) {
            if ($_SESSION['status_login'] == true) {
              echo '<h4 style="text-transform: uppercase; color: brown">' . $_SESSION['username'] . '</h4>';
            }
          } else if (!isset($_SESSION['status_login'])) {
            echo '<h3 style="color: brown;">Guest</h3>';
          }
          ?>
        </span>
      </div>
    </div>
  </nav>



  <?php
  if (isset($_SESSION['status_login'])) {
    echo '<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
          <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasExampleLabel">Menu</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
            <ul class="list-unstyled">  
            ';

    include "koneksi.php";
    $query = mysqli_query($conn, "select * from client where id = '" . $_SESSION['id'] . "'");
    $status_user = mysqli_fetch_array($query);
    if ($status_user['role'] == 'admin') {
      echo '
            <li class="mb-3">
            <a class="btn btn-primary w-100" id="offcanvasitem" href="item_manager.php">Manage Auction</a>
            </li>
            <li class="mb-3">
            <a class="btn btn-primary w-100" id="offcanvasitem" href="user_manager.php">Manage Users</a>
            </li>
            ';
    }

    echo ' <li class="mb-3">
          <a class="btn btn-primary w-100" id="offcanvasitem" href="tambah_item.php">Add Item</a>
        </li>
        <li class="mb-3">
          <a class="btn btn-primary w-100" id="offcanvasitem" href="bid_history.php">Bid History</a>
        </li>
        <li class="mb-3">
          <a class="btn btn-primary w-100" id="offcanvasitem" href="publisher_item.php">Your Items</a>
        </li>
      </ul>
    </div>
  </div>
';
  }
  ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>