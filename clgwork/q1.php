<?php
include '../clgwork/include.php';

if (isset($_POST['submit'])) {

    $itemname = $_POST['itemname'];
    $itemtype = $_POST['itemtype'];
    $quantity = $_POST['quantity'];

    $sql = "INSERT INTO tbl_q1 (orderid, itemname, itemtype, quantity) VALUES ('0', '$itemname', '$itemtype', '$quantity')";

    $rs = mysqli_query($con, $sql);
    if ($rs) {
        echo "<script>
            alert('added!');
            window.location.href='q1.php';
            </script>";
        exit();
    } else {
        echo "<script>
            alert('not added');
            window.location.href='q1.php';
            </script>";
    }
    //connection closed.
    mysqli_close($con);
}




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Q1</title>
    <!-- <link rel="stylesheet" href="./bootstrap.css"> -->
    <style>
        .display table,
        .display td,
        .display th {
            border: 1px solid black;
        }
    </style>
</head>

<body>
    <div>
        <form method="post">
            <p>
                <label>Item Name
                    <input type="text" name="itemname" required>
                </label>
            </p>

            <p>
                <label>Item Type
                    <input type="text" name="itemtype">
                </label>
            </p>

            <p>
                <label>Quantity
                    <input type="tel" name="quantity">
                </label>
            </p>
            <p>
                <button name="submit">place order</button>
            </p>
        </form>
    </div>
    <div class="display">
        <table>
            <thead>
                <tr>
                    <th>Order No.</th>
                    <th>Item Name</th>
                    <th>Item Type</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody>
                <?php


                $sql = "SELECT * FROM tbl_q1 ";
                $result = $con->query($sql);

                while ($row = $result->fetch_assoc()) {

                ?>
                    <tr>
                        <td><?php echo $row["orderid"]; ?></td>
                        <td><?php echo $row["itemname"]; ?></td>
                        <td><?php echo $row["itemtype"]; ?></td>
                        <td><?php echo $row["quantity"]; ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>