<?php
if(isset($_SESSION['email']))
{

}
else 
{
     header("url=index.php?msg=error");
}

// if (!isset($_SESSION['email'])) {
//     header('url=index.php');
//     exit;
// }