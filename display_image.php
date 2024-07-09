<?php
include "koneksi.php";
if (isset($_GET['image_id'])) {
    $sql = "SELECT covertype, cover FROM item WHERE id =?";
    $statement = $conn->prepare($sql);
    $statement->bind_param("i", $_GET['image_id']);
    $statement->execute() or die("<b>Error:</b> Problem on Retrieving Image BLOB<br/>" . mysqli_connect_error());
    $result = $statement->get_result();
    $row = $result->fetch_assoc();
    header("Content-type: " . $row["covertype"]);
    echo $row["cover"];
}
else{
    echo"kontol";
}
?>