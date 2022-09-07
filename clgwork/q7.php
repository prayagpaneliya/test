<?php
include '../clgwork/include.php';

session_start();

if (isset($_POST['insert'])) {
    $personname = $_POST['personname'];
    $city = $_POST['city'];
    $mobile = $_POST['mobile'];
    $cast = $_POST['cast'];
    $subcast = $_POST['subcast'];
    $gender = $_POST['gender'];
    $qualification = $_POST['qualification'];

    $_SESSION['personname'] = $personname;
    $_SESSION['city'] = $city;
    $_SESSION['mobile'] = $mobile;
    $_SESSION['cast'] = $cast;
    $_SESSION['subcast'] = $subcast;
    $_SESSION['gender'] = $gender;
    $_SESSION['qualification'] = $qualification;

    if ($personname != "" && $city != "" && $mobile != "" && $cast != "" && $subcast != "" && $gender != "" && $qualification != "") {
        $querry = "INSERT INTO tbl_q7 (id, personname, city, mobile, cast, subcast, gender, qualification) VALUES ('0','$personname','$city','$mobile','$cast','$subcast','$gender','$qualification')";
        mysqli_query($con, $querry);
    }
}

?>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Q7</title>
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
    <form method="POST">
        <table>
            <tr>
                <td> Person Name :</td>
                <td> <input type="text" name="personname"></t d>
            </tr>
            <tr>
                <td> City : </td>
                <td> <input type="text" name="city"></td>
            </tr>

            <tr>
                <td> Mobile Number : </td>
                <td> <input type="number" name="mobile"></td>
            </tr>
            <tr>
                <td> Cast : </td>
                <td> <input type="text" name="cast"></td>
            </tr>
            <tr>
                <td> Sub Cast : </td>
                <td> <input type="text" name="subcast"></td>
            </tr>
            <tr>
                <td> Gender : </td>
                <td> <input type="text" name="gender"></td>
            </tr>
            <tr>
                <td> Qualification : </td>
                <td> <input type="text" name="qualification"></t d>
            </tr>
        </table>
        <table>

            <tr>
                <br>
                <td> <input type="submit" class="btn1" name="insert" value="Insert">
                    <input type="submit" class="btn1" name="search" value="Search">
                </td>
            </tr>
        </table>
    </form>
    <br>
    <div class="display">
        <table>
            <tr>
                <th>Person Name</th>
                <th>City</th>
                <th>Mobie Number</th>
                <th>Cast</th>
                <th>Sub Cast</th>
                <th>Gender</th>
                <th>Qualification</th>
            </tr>
            <?php
            if (isset($_POST['search'])) {
                $city = $_POST['city'];
                $cast = $_POST['cast'];

                $res = mysqli_query($con, "select * from tbl_q7 where city = '$city' || cast='$cast'");
                while ($row = mysqli_fetch_array($res)) {
                    echo "<tr>";
                    echo "<td>";
                    echo $row["personname"];
                    echo "</td>";
                    echo "<td>";
                    echo $row["city"];
                    echo "</td>";
                    echo "<td>";
                    echo $row["mobile"];
                    echo "</td>";
                    echo "<td>";
                    echo $row["cast"];
                    echo "</td>";
                    echo "<td>";
                    echo $row["subcast"];
                    echo "</td>";
                    echo "<td>";
                    echo $row["gender"];
                    echo "</td>";
                    echo "<td>";
                    echo $row["qualification"];
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                $res = mysqli_query($con, "select * from tbl_q7");
                while ($row = mysqli_fetch_array($res)) {
                    echo "<tr>";
                    echo "<td>";
                    echo $row["personname"];
                    echo "</td>";
                    echo "<td>";
                    echo $row["city"];
                    echo "</td>";
                    echo "<td>";
                    echo $row["mobile"];
                    echo "</td>";
                    echo "<td>";
                    echo $row["cast"];
                    echo "</td>";
                    echo "<td>";
                    echo $row["subcast"];
                    echo "</td>";
                    echo "<td>";
                    echo $row["gender"];
                    echo "</td>";
                    echo "<td>";
                    echo $row["qualification"];
                    echo "</td>";
                    echo "</tr>";
                }
            }
            ?>
        </table>
    </div>
</body>

</html>