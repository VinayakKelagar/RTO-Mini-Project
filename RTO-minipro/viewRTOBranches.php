<?php
    session_start();
    require_once('Connection.php');
    $obj = new Connection();
    $db = $obj->getNewConnection();
    $sql = "select * from RTO_Branch";
    $res = $db->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>VIEW RTO BRANCHES</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <?php require_once('header.php'); ?>
    <h1 class="text-white text-center font-weight-bold bg-warning" style="font-size: 55px;"> VIEW RTO BRANCHES</h1>
    <form method="post">
        <table class="table">
            <thead>
            <tr>
            <th scope="col">CODE OF BRANCH</th>
            <th scope="col">Branch Name</th>
            <th scope="col">Branch City</th>
            <th scope="col">STD Code</th>
            </tr>
            </thead>
            <tbody>
            <?php while ($row = $res->fetch_assoc()) : ?>
            <tr>
                <td><?php echo $row['RTO_Code'] ?></td>
                <td><?php echo $row['Branch_Name'] ?></td>
                <td><?php echo $row['Branch_City'] ?></td>
                <td><?php echo $row['STD_Code'] ?></td>
            </tr>
            <?php endwhile; ?>
        </table>
    </form>
    <br><br>
    <br>
    <?php require_once('footer.php'); ?>
    <!-- ##### All Javascript Script ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>
</body>
</html>