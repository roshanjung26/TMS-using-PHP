<?php
require("../connection/config.php");


if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    if ($email != "" && $password != "") {
        $login = "SELECT *FROM users WHERE email='$email' AND password='$password'";
        $result = mysqli_query($con, $login);
        
        $count= mysqli_num_rows($result); // count each row
       
        if($count==1){
            $row= $result->fetch_assoc(); // fetch one row

            session_start();
            $_SESSION['id']=  $row['id'];
            $_SESSION['name']=  $row['name'];
            $_SESSION['email']=  $row['email'];
            echo header("Location: ../home.php?msg=login_success");

        } else {
            echo "<p>Invalid email or password.</p>";
        }
    } else {
        header("Refresh:0; url=../index.php?msg-faild");
    }
}
