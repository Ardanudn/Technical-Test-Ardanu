<?php
require('koneksi.php');
session_start();
if (!isset($_SESSION["login"])) {
    header("Location : login.php");
    exit;
}

$data = mysqli_query($conn, 'SELECT * FROM distributor');

require "header.php"; ?>

<div>
    <table>
        <tr>
            <th>Distributor Name</th>
            <th>City</th>
            <th></th>
        </tr>
        <?php if (mysqli_num_rows($data) > 0) { ?>
            <?php
            $id = 1;
            while ($distributor = mysqli_fetch_array($data)) {
            ?>
                <tr>
                    <td><?= $distributor['distributorName']; ?></td>
                    <td><?= $distributor['city']; ?></td>
                    <td><a href="edit_distributor.php?id=<?= $distributor['id']; ?>">[Edit]</a></td>
                </tr>
            <?php $id++;
            } ?>
        <?php } ?>
    </table>
</div>

<a style="margin-top: 10px;" href="add_distributor.php">[Add]</a>

<?php
require "footer.php";
?>