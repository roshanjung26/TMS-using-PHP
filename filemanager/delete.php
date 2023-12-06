<?php
require("../connection/config.php");

if(isset($_GET['id'])){
    $id= $_GET['id'];

    $query1="SELECT * FROM filemanagers where id= $id";
    $result= mysqli_query($con, $query1);
    $row= $result->fetch_assoc();
    

    $filelink= $row['img_link'];
    $finallink= '../uploads/'.$filelink;
    unlink($finallink); // delete file from uploads folder

    // delete data from database
    $select="DELETE FROM filemanagers WHERE id=$id";
    $select_result=mysqli_query($con, $select);


    echo header("Refresh:0; url=index.php");
}
?>