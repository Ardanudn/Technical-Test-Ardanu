<?php
require('koneksi.php');
session_start();
if (!isset($_SESSION["login"])) {
    header("Location : login.php");
    exit;
}

$data = mysqli_query($conn, 'SELECT * FROM beans');

require "header.php"; ?>

<div align="center">
    <table>
        <tr>
            <th>Bean</th>
            <th>Description</th>
            <th>Price Unit</th>
        </tr>
        <?php if (mysqli_num_rows($data) > 0) { ?>
            <?php
            $id = 1;
            while ($databean = mysqli_fetch_array($data)) {
            ?>
                <tr>
                    <td><?= $databean['name']; ?></td>
                    <td><?= $databean['description']; ?></td>
                    <td><?= $databean['price']; ?></td>
                </tr>
            <?php $id++;
            } ?>
        <?php } ?>
    </table>
</div>


<?php
require "footer.php";
?>