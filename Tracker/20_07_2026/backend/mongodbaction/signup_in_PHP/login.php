<?php
    include ("db.php");
    $username=$_POST['username'];
    $password=$_POST['password'];
    $sql = "select * from users where username='$username'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result)>0){
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row['password'])){
            echo "login successfull";
        }else{
            echo "invalid credentials";
        }
    }else{
        echo "user not found";
    }
    mysqli_close($conn);
?>