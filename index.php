<?php
require('koneksi.php');
session_start();
if (!isset($_SESSION["login"])) {
    header("location : login.php");
    exit;
}

$query = 'SELECT b.name, b.description, db.sale_price
FROM beans AS b
INNER JOIN daily_beans AS db
ON b.id = db.beans_id;';

$data = mysqli_query($conn, $query);

require "header.php";

if (mysqli_num_rows($data) > 0) { ?>
    <?php
    $rows = [];
    while ($row = mysqli_fetch_array($data)) {
        $rows[] = $row;
    }
    $databean = $rows[0]
    ?>
    <h4>Bean of The Day</h4>
    <h2><?= $databean['name']; ?></h2>
    <h4>Sale Price</h4>
    <h2>$ <?= $databean['sale_price']; ?></h2>
    <h4>Description</h4>
    <p><?= $databean['description']; ?></p>
<?php
}
require "footer.php";
?>