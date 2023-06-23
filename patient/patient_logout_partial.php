<?php
    session_start();
    unset($_SESSION['pid']);
    session_destroy();

    header("Location: patient_logout.php");
    exit;
?>