<?php
include '../clgwork/include.php';

if (isset($_POST['submit'])) {

    $roll = $_POST['roll'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $city = $_POST['city'];
    $mobile = $_POST['mobile'];


    $sql = "INSERT INTO tbl_q3 (id, roll, name, age, city, mobile) VALUES ('0', '$roll', '$name', '$age', '$city', '$mobile')";

    $rs = mysqli_query($con, $sql);
    if ($rs) {
        echo "<script>
            window.location.href='q3.php';
            </script>";
        exit();
    } else {
        echo "<script>
            window.location.href='q3.php';
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
    <title>Q3</title>
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
                    <td> Roll No : </td>
                    <td> <input type="number" name="roll"></td>
                </tr>
                <tr>
                    <td> Name :</td>
                    <td> <input type="text" name="name"></td>
                </tr>
                <tr>
                    <td> Age : </td>
                    <td> <input type="number" name="age"></td>
                </tr>
                <tr>
                    <td> City :</td>
                    <td> <input type="text" name="city"></td>
                </tr>
                <tr>
                    <td> Mobile No : </td>
                    <td> <input type="number" name="mobile"></td>
                </tr>
                <tr>
                    <td> </td>
                    <td> <button name="submit">Register</button></td>
                </tr>
            </table>
        </form>
    </div>
    <div class="display">
        <table>
            <thead>
                <tr>
                    <th>roll</th>
                    <th>name</th>
                    <th>age</th>
                    <th>city</th>
                    <th>mobile</th>
                </tr>
            </thead>
            <tbody>
                <?php


                $sql = "SELECT * FROM tbl_q3 ORDER BY roll  ";
                $result = $con->query($sql);

                while ($row = $result->fetch_assoc()) {

                ?>
                    <tr>
                        <td><?php echo $row["roll"]; ?></td>
                        <td><?php echo $row["name"]; ?></td>
                        <td><?php echo $row["age"]; ?></td>
                        <td><?php echo $row["city"]; ?></td>
                        <td><?php echo $row["mobile"]; ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>