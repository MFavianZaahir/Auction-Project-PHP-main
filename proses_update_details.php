<?php
if ($_POST) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $deskripsi = $_POST['deskripsi'];
    $startprice = $_POST['startprice'];
    include "koneksi.php";

    if (!empty($_FILES['foto']['name'])) {
        $imgType = $_FILES['foto']['type'];
        $file_content = file_get_contents($_FILES['foto']['tmp_name']);
        $stmt = $conn->prepare("UPDATE item SET name=?, startprice=?, cover=?, covertype=?, deskripsi=? WHERE id=?");
        $stmt->bind_param("sssssi", $name, $startprice, $file_content, $imgType, $deskripsi, $id);
    } else {
        $stmt = $conn->prepare("UPDATE item SET name=?, startprice=?, deskripsi=? WHERE id=?");
        $stmt->bind_param("sssi", $name, $startprice, $deskripsi, $id);
    }

    if ($stmt->execute()) {
        echo "<script>alert('sukses update');location.href='details_publisher_item.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
