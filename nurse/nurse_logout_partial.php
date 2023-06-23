<?php
    session_start();
    unset($_SESSION['sid']);
    session_destroy();

    header("Location: nurse_logout.php");
    exit;
?>