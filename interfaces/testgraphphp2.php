<?php
    $servername = "localhost";
    $username = "root";
    $password = "";  //your database password
    $dbname = "cambeep";  //your database name

    $con = new mysqli($servername, $username, $password, $dbname);

    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }
    else
    {
        //echo ("Connect Successfully");
    }
    $query = "SELECT item_name, quantity FROM equipment"; // select column
    $aresult = $con->query($query);

?>