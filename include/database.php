<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "maindb";

    $link = new mysqli($servername, $username, $password, $dbname);
    $link->query("SET NAMES 'utf8'");

    //mysqli_close($link);
?>