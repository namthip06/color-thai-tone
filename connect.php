<?php

$connect = new mysqli("localhost","root","","thaitone",3306);
$connect -> set_charset("utf8");

if(mysqli_connect_error()) {
    echo "connect error !";
}

?>