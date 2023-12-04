<?php
session_start();

// session_destroy();


unset($_SESSION['id']);
unset($_SESSION['username']);
unset($_SESSION['email']);

 echo header("Location: ../index.php?msg=logout_success");