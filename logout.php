<?php
session_start();//session can be destroy in two ways one way using session destroy and other is unset function
//session_destroy();
unset($_SESSION['email']);
echo "<script>window.location='register.php';</script>";



?>