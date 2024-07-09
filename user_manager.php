<?php
include "header.php";
include "koneksi.php";
if (!isset($_SESSION['id'])) {
    echo "<script>alert('belum login ncrit');location.href='home.php';</script>";
} else if ($_SESSION['role'] !== 'admin') {
    echo "<script>alert('admin mana njing');location.href='home.php';</script>";
}
?>

<div class="container" style="padding-top: 4rem;">
    <div class="text-center p-3">
        <h3>User Manager</h3>
    </div>
    <table class="table table-hover table-striped shadow">
        <thead>
            <tr class="text-center">
                <th>ID</th>
                <th>Username</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $qry_user = mysqli_query($conn, "select * from client");
            $no = 0;
            while ($dt_users = mysqli_fetch_array($qry_user)) {
                $no++;
            ?>
                <tr class="text-center">
                    <td>
                        <?= $dt_users['id'] ?>
                    </td>
                    <td>
                        <?= $dt_users['username'] ?>
                    </td>
                    <td>
                        <?= $dt_users['role'] ?>
                    </td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                Actions
                            </button>
                            <ul class="dropdown-menu">
                                <?php
                                if ($dt_users['role'] == 'admin') {
                                    echo '<li><a class="dropdown-item" href="user_managing.php?id_user_touser=' . $dt_users['id'] . '">Demote To User</a></li>';
                                }
                                if ($dt_users['role'] == 'user') {
                                    echo '<li><a class="dropdown-item" href="user_managing.php?id_user_toadmin=' . $dt_users['id'] . '">Promote To Admin</a></li>';
                                }
                                ?>
                                <li><a class="dropdown-item" href="user_managing.php?id_user=<?= $dt_users['id'] ?>">Delete
                                        User</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>
</body>

</html>