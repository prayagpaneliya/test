<?php
include '../clgwork/include.php';

if (isset($_POST['submit'])) {

    $bookcode = $_POST['bookcode'];
    $bookname = $_POST['bookname'];
    $authorname = $_POST['authorname'];
    $cost = $_POST['cost'];
    $isbnno = $_POST['isbnno'];

    $sql = "INSERT INTO tbl_q4 (id, bookcode, bookname, authorname, cost, isbnno) VALUES ('0', '$bookcode', '$bookname', '$authorname', '$cost', '$isbnno')";

    $rs = mysqli_query($con, $sql);
    if ($rs) {
        echo "<script>
            window.location.href='q4.php';
            </script>";
        exit();
    } else {
        echo "<script>
            window.location.href='q4.php';
            </script>";
    }
    //connection closed.
    mysqli_close($con);
}
if (isset($_POST['update'])) {

    $bookcode = $_POST['bookcode'];
    $bookname = $_POST['bookname'];
    $authorname = $_POST['authorname'];
    $cost = $_POST['cost'];
    $isbnno = $_POST['isbnno'];

    $sql =  " UPDATE tbl_q4 SET bookname = '$bookname',authorname = '$authorname',cost = '$cost' WHERE  (bookcode = '$bookcode') ";

    $rs = mysqli_query($con, $sql);
    if ($rs) {
        echo "<script>
            window.location.href='q4.php';
            </script>";
        exit();
    } else {
        echo "<script>
            window.location.href='q4.php';
            </script>";
    }
    //connection closed.
    mysqli_close($con);
}

if (isset($_POST['search'])) {

    $bookcode = $_POST['bookcode'];
    $bookname = $_POST['bookname'];
    $authorname = $_POST['authorname'];
    $cost = $_POST['cost'];
    $isbnno = $_POST['isbnno'];

    $res = mysqli_query($con, "select * from tbl_q4 where bookcode='$bookcode' || authorname='$authorname'");

    while ($row = mysqli_fetch_array($res)) {
        echo "<tr>";
        echo "<td>";
        echo $row["bookcode"];
        echo "</td>";
        echo "<td> ";
        echo $row["bookname"];
        echo "</td>";
        echo "<td>";
        echo $row["authorname"];
        echo "</td>";
        echo "<td>";
        echo $row["cost"];
        echo "</td>";
        echo "<td> ";
        echo $row["isbnno"];
        echo "</td>";
        echo "</tr>";
    }
}
// else {
//     $res = mysqli_query($con, "select * from tbl_q4");
//     while ($row = mysqli_fetch_array($res)) {
//         echo "<tr>";
//         echo "<td>";
//         echo $row["bookcode"];
//         echo "</td>";
//         echo "<td>";
//         echo $row["bookname"];
//         echo "</td>";
//         echo "<td>";
//         echo $row["authorname"];
//         echo "</td>";
//         echo "<td>";
//         echo $row["cost"];
//         echo "</td>";
//         echo "<td>";
//         echo $row["isbnno"];
//         echo "</td>";
//         echo "</tr>";
//     }
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Q4</title>
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
                    <td> Book Code : </td>
                    <td> <input type="number" name="bookcode"></td>
                </tr>
                <tr>
                    <td> Book Name :</td>
                    <td> <input type="text" name="bookname"></td>
                </tr>
                <tr>
                    <td> Author Name :</td>
                    <td> <input type="text" name="authorname"></td>
                </tr>
                <tr>
                    <td> Cost : </td>
                    <td> <input type="number" name="cost"></td>
                </tr>
                <tr>
                    <td> Isbn No : </td>
                    <td> <input type="number" name="isbnno"></td>
                </tr>
            </table>
            <br>
            <table>
                <tr>
                    <td> <input type="submit" name="submit" value="Insert">
                        <input type="submit" name="update" value="Update">
                        <input type="submit" name="search" value="Search">
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
                    <th>book code</th>
                    <th>book name</th>
                    <th>author name</th>
                    <th>cost</th>
                    <th>isbn no</th>
                </tr>
            </thead>
            <tbody>
                <?php


                $sql = "SELECT * FROM tbl_q4  ";
                $result = $con->query($sql);

                while ($row = $result->fetch_assoc()) {

                ?>
                    <tr>
                        <td><?php echo $row["bookcode"]; ?></td>
                        <td><?php echo $row["bookname"]; ?></td>
                        <td><?php echo $row["authorname"]; ?></td>
                        <td><?php echo $row["cost"]; ?></td>
                        <td><?php echo $row["isbnno"]; ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>