<?php
include "koneksi.php";

function deleteUser($conn, $id_user)
{
    $qry_hapus = mysqli_query($conn, "DELETE FROM client WHERE id = '$id_user'");
    if ($qry_hapus) {
        return true;
    } else {
        return false;
    }
}

function updateUserRoleToAdmin($conn, $id_user)
{
    $qry_update = mysqli_query($conn, "UPDATE client SET role = 'admin' WHERE id = '$id_user'");
    if ($qry_update) {
        return true;
    } else {
        return false;
    }
}

function updateUserRoleToUser($conn, $id_user)
{
    $qry_update = mysqli_query($conn, "UPDATE client SET role = 'user' WHERE id = '$id_user'");
    if ($qry_update) {
        return true;
    } else {
        return false;
    }
}

if (isset($_GET['id_user'])) {
    $id_user = $_GET['id_user'];
    if (deleteUser($conn, $id_user)) {
        echo "<script>alert('Success delete user');location.href='user_manager.php';</script>";
    } else {
        echo "<script>alert('Failed to delete user');location.href='user_manager.php';</script>";
    }
}

if (isset($_GET['id_user_toadmin'])) {
    $id_user = $_GET['id_user_toadmin'];
    if (updateUserRoleToAdmin($conn, $id_user)) {
        echo "<script>alert('Success update user role to admin');location.href='user_manager.php';</script>";
    } else {
        echo "<script>alert('Failed to update user role to admin');location.href='user_manager.php';</script>";
    }
}

if (isset($_GET['id_user_touser'])) {
    $id_user = $_GET['id_user_touser'];
    if (updateUserRoleToUser($conn, $id_user)) {
        echo "<script>alert('Success update user role to user');location.href='user_manager.php';</script>";
    } else {
        echo "<script>alert('Failed to update user role to user');location.href='user_manager.php';</script>";
    }
}
