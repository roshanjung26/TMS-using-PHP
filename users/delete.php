<?php
require("../connection/config.php");

if(isset($_GET['id'])){
    $id= $_GET['id'];

    $select="DELETE FROM users WHERE id=$id";
    $select_result=mysqli_query($con, $select);

    echo header("Refresh:0; url=index.php");
}
?>