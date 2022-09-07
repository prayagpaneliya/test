<?php
include '../clgwork/include.php';

if (isset($_POST['submit'])) {

    $client_name = $_POST['client_name'];
    $source = $_POST['source'];
    $destination = $_POST['destination'];
    $address1 = $_POST['address1'];
    $no_of_passenger = $_POST['no_of_passenger'];
    $travelling_date = $_POST['travelling_date'];
    $train_no = $_POST['train_no'];

    $sql = "INSERT INTO tbl_q2 (id, client_name, source, destination, address1, no_of_passenger, travelling_date, train_no) VALUES ('0', '$client_name', '$source', '$destination', '$address1', '$no_of_passenger', '$travelling_date', '$train_no')";

    $rs = mysqli_query($con, $sql);
    if ($rs) {
        echo "<script>
            alert('booked!');
            window.location.href='q2.php';
            </script>";
        exit();
    } else {
        echo "<script>
            alert('not booked');
            window.location.href='q2.php';
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
    <title>Q2</title>
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
                <label>client name
                    <input type="text" name="client_name" required>
                </label>
            </p>
            <p>
                <label>source
                    <input type="text" name="source" required>
                </label>
            </p>
            <p>
                <label>destination
                    <input type="text" name="destination" required>
                </label>
            </p>
            <p>
                <label>address1
                    <input type="text" name="address1" required>
                </label>
            </p>
            <p>
                <label>no of passenger
                    <input type="number" name="no_of_passenger" required>
                </label>
            </p>
            <p>
                <label>travelling date
                    <input type="date" name="travelling_date" required>
                </label>
            </p>
            <p>
                <label>train no
                    <input type="text" name="train_no" required>
                </label>
            </p>
            <p>
                <button name="submit">Book tickit</button>
            </p>
        </form>
    </div>
    <div class="display">
        <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>client name</th>
                    <th>source</th>
                    <th>destination</th>
                    <th>address1</th>
                    <th>no of passenger</th>
                    <th>travelling date</th>
                    <th>train no</th>
                </tr>
            </thead>
            <tbody>
                <?php


                $sql = "SELECT * FROM tbl_q2 ";
                $result = $con->query($sql);

                while ($row = $result->fetch_assoc()) {

                ?>
                    <tr>
                        <td><?php echo $row["id"]; ?></td>
                        <td><?php echo $row["client_name"]; ?></td>
                        <td><?php echo $row["source"]; ?></td>
                        <td><?php echo $row["destination"]; ?></td>
                        <td><?php echo $row["address1"]; ?></td>
                        <td><?php echo $row["no_of_passenger"]; ?></td>
                        <td><?php echo $row["travelling_date"]; ?></td>
                        <td><?php echo $row["train_no"]; ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>