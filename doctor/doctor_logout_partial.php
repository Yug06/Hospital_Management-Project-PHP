<?php
    session_start();
    unset($_SESSION['did']);
    session_destroy();

    header("Location: doctor_logout.php");
    exit;
?>