<?php
    session_start();
    unset($_SESSION['sid']);
    session_destroy();

    header("Location: accountant_logout.php");
    exit;
?>