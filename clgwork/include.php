<?php

//database details. You have created these details in the third step. Use your own.
$host = "localhost";
$username = "root";
$password = "pr@yagpaneliya8650";
$dbname = "db_assignment";

//create connection
$con = mysqli_connect($host, $username, $password, $dbname);
//check connection if it is working or not
if (!$con) {
    die("Connection failed!" . mysqli_connect_error());
}