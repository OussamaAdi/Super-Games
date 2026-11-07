<?php
    $con = mysqli_connect("localhost", "root", "");
    if(!$con)
        die("Could not connect ". mysqli_connect_error());
    $DBcon = mysqli_select_db($con, "Project");
    if(!$DBcon)
        die("Could not find the database");
?>