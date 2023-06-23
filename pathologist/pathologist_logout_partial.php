<?php
    session_start();
    unset($_SESSION['sid']);
    session_destroy();

    header("Location: pathologist_logout.php");
    exit;
?>