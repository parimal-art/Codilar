<?php

$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "subway_db"
);

if(!$conn){
    die("Connection Failed");
}

?>