<?php
include '../clgwork/include.php';

if (isset($_POST['submit'])) {

    $no = $_POST['no'];
    $company = $_POST['company'];
    $model = $_POST['model'];
    $price = $_POST['price'];


    $sql = "INSERT INTO tbl_q5 (id, no, company, model, price) VALUES ('0', '$no', '$company', '$model', '$price')";

    $rs = mysqli_query($con, $sql);
    if ($rs) {
        echo "<script>
            window.location.href='q5.php';
            </script>";
        exit();
    } else {
        echo "<script>
            window.location.href='q5.php';
            </script>";
    }
    //connection closed.
    mysqli_close($con);
}

if (isset($_POST['delete'])) {

    $id = $_POST['id'];

    $sql = "DELETE FROM tbl_q5 WHERE (id = '$id')";

    $rs = mysqli_query($con, $sql);
    if ($rs) {
        echo "<script>
            window.location.href='q5.php';
            </script>";
        exit();
    } else {
        echo "<script>
            window.location.href='q5.php';
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
    <title>Q5</title>
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
            <table>
                <tr>
                    <td> No of product : </td>
                    <td> <input type="number" name="no"></td>
                </tr>
                <tr>
                    <td> company :</td>
                    <td> <input type="text" name="company"></td>
                </tr>
                <tr>
                    <td> model : </td>
                    <td> <input type="text" name="model"></td>
                </tr>
                <tr>
                    <td> price :</td>
                    <td> <input type="number" name="price"></td>
                </tr>
            </table>
            <br>
            <table>
                <tr>
                    <td> <input type="submit" name="submit" value="Add">

                    </td>
                    <td> <input type="number" name="id" placeholder="enter id for delete"></td>
                    <td>
                        <input type="submit" name="delete" value="Delete">
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <br>
    <div class="display">
        <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>number of product</th>
                    <th>company</th>
                    <th>model</th>
                    <th>price</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM tbl_q5";
                $result = $con->query($sql);

                while ($row = $result->fetch_assoc()) {
                ?>
                    <tr>
                        <td><?php echo $row["id"]; ?></td>
                        <td><?php echo $row["no"]; ?></td>
                        <td><?php echo $row["company"]; ?></td>
                        <td><?php echo $row["model"]; ?></td>
                        <td><?php echo $row["price"]; ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>