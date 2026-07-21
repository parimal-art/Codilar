<?php
    include("db.php");
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $sql="Insert into users(username, password) values('$username','$password')";

    if(mysqli_query($conn, $sql)){
        header("location: success.php");
    }else{
        echo "error";
    }
    mysqli_close($conn);
?>