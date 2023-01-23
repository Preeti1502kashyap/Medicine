<?php
session_start();//session can be destroy in two ways one way using session destroy and other is unset function
//session_destroy();
unset($_session['aemail']);
echo "<script>window.location='login.php';</script>";



?>