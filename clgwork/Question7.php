<?php
include("config.php");
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
}
?>
<html>

<head>
    <title>
        Question - 7
    </title>
    
    <link href="./StyleSheet1.css" rel="stylesheet" />
</head>

<body>
    <center>
        <h1> Question - 7</h1>
        <form name="form" method="POST" action="">
            <table>
                <tr>
                    <td> Enter Person Name :- :- </td>
                    <td> <input type="text" name="personname" placeholder="person Name"></t d>
                </tr>
                <tr>
                    <td> Enter City :- :- </td>
                    <td> <input type="text" name="city" placeholder="City"></td>
                </tr>

                <tr>
                    <td> Enter Mobile Number :- </td>
                    <td> <input type="number" name="mobile" placeholder="Mobile Number"></ td>
                </tr>
                <tr>
                    <td> Enter Cast :- </td>
                    <td> <input type="text" name="cast" placeholder="Cast"></td>
                </tr>
                <tr>
                    <td> Enter Sub Cast :- </td>
                    <td> <input type="text" name="subcast" placeholder="Sub Cast"></td>
                </tr>
                <tr>
                    <td> Enter Gender :- </td>
                    <td> <input type="text" name="gender" placeholder="Gender"></td>
                </tr>
                <tr>
                    <td> Enter Qualification :- </td>
                    <td> <input type="text" name="qualification" placeholder="Qualification"></t d>
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
        <table border="1">
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

                $res = mysqli_query($con, "select * from matrimony where city = '$city' || cast='$cast'");
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
                $res = mysqli_query($con, "select * from matrimony");
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
            if (isset($_POST['insert'])) {
                $personname = $_POST['personname'];
                $city = $_POST['city'];
                $mobile = $_POST['mobile'];
                $cast = $_POST['cast'];
                $subcast = $_POST['subcast'];
                $gender = $_POST['gender'];
                $qualification = $_POST['qualification'];

                if ($personname != "" && $city != "" && $mobile != "" && $cast != "" && $subcast != "" && $gender != "" && $qualification != "") {
                    // $querry = "insert into matrimony values('0','$personname','$city','$mobile','$cast','$subcast','$gender','$qualification')";
                    $querry = "INSERT INTO matrimony (id, personname, city, mobile, cast, subcast, gender, qualification) VALUES ('0','$personname','$city','$mobile','$cast','$subcast','$gender','$qualification')";
                    mysqli_query($con, $querry);
                }
            }

            ?>
        </table>
    </center>
</body>

</html>